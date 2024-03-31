<?php

namespace App\Http\Controllers;

use App\Models\Fees;
use App\Models\Student;
use App\Models\SeatReservation;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\DB;


class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admissions = DB::table("fees")->select("fees.*", "students.student_name as student_name")->join("students", "students.id",  "=", "fees.student_id")->where("fees.payment_for", "admission")->get();
        
        $months = DB::table("fees")->select("fees.*", "students.student_name as student_name")->join("students", "students.id",  "=", "fees.student_id")->where("fees.payment_for", "monthly")->get();
        
        return view("admin.fees.index", compact("admissions", "months"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        return view('admin.fees.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $last_payment = Fees::where(["student_id" => $request->student_id, "payment_for" => "monthly"])->latest()->first();

        if($last_payment) {
            $from_date = date('Y-m-d', strtotime($last_payment->to_date . ' +1 day'));
        }
        else {
            $seat_reservation = SeatReservation::where("student_id", $request->student_id)->first();

            $given_date = $seat_reservation->reserve_from; 
            $date_object = new DateTime($given_date);
            $date_object->modify('first day of this month');

            $from_date = $date_object->format('Y-m-d');
        }
        
        $from_date_obj = new DateTime($from_date);
        $to_date_obj = $from_date_obj->modify('+'. ($request->number_of_months - 1). 'months');
        $to_date = $to_date_obj->format('Y-m-t');

        $monthly_fees = new Fees();
        $monthly_fees->student_id = $request->student_id;
        $monthly_fees->total_amount = $request->total_fees;
        $monthly_fees->payment_amount = $request->payble_amount;
        $monthly_fees->payment_for = "monthly";
        $monthly_fees->payment_mode = "offline";
        $monthly_fees->payment_date = date('Y-m-d');
        $monthly_fees->from_date = $from_date;
        $monthly_fees->to_date = $to_date;

        $monthly_fees->discount_applied = $request->discount_applied;
        $monthly_fees->discount_amount = $request->discount_amount;
        $monthly_fees->discount_type = $request->discount_type;
        $monthly_fees->cash_amount = $request->cash_amount;
        $monthly_fees->return_amount = $request->return_amount;

        $monthly_fees->save();

        return redirect()->route("fees.create")->with("success", "Fees Collected Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Fees $fees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fees $fees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fees $fees)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fees $fees)
    {
        //
    }
}
