<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = DB::table("discounts")
        ->select("students.*", "discounts.amount as discount_amount", "discounts.type as discount_type", "discounts.is_active as discount_is_active", "academy_classes.name as class", "vehicles.registration_no as vehicle_registration_no", "vehicles.identity_no as identity_no", "stopages.name as stopage_name", "stopages.fare as stopage_fare")
        ->join("students", "students.id", "=", "discounts.student_id")
        ->join("academy_classes", "students.academy_class_id", "=", "academy_classes.id")
        ->join("seat_reservations", "students.id", "=", "seat_reservations.student_id")
        ->join("vehicles", "seat_reservations.vehicle_id", "=", "vehicles.id")
        ->join("stopages", "seat_reservations.stopage_id", "=", "stopages.id")
        ->get();    
        
        return view("admin.discounts.index", compact("students"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Extract data from request
        $studentId = $request->input('student_id');
        $amount = $request->input('amount');
        $type = $request->input('type');
        $isActive = $request->input('is_active');

        $rows = count($studentId);
        for($i = 0; $i < $rows; $i++) {
            $student_discount = Discount::where("student_id", $studentId[$i])->first();
            $student_discount->amount = $amount[$i];
            $student_discount->type = $type[$i];
            $student_discount->is_active = $isActive[$i] == "on" ? 1 : 0;
            $student_discount->save();
        }

        return redirect()->route("discounts.index")->with("success", "Record updated successfully");
    }
}
