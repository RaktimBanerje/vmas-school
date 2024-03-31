<?php

namespace App\Http\Controllers;

use App\Models\AcademyClass;
use App\Models\Fees;
use App\Models\SeatReservation;
use App\Models\Section;
use App\Models\Stopage;
use App\Models\Student;
use App\Models\Vehicle;
use App\Models\Discount;
use App\Models\VehicleStopage;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\DataTables\StudentsDataTable;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(StudentsDataTable $dataTable)
    {
        if (request()->ajax()) {
            return DataTables::of(Student::query())->toJson();
            // ->addColumn('action', function ($vehicle) {
            //     $editUrl = route('vehicles.edit', $vehicle->id);
            //     $deleteUrl = route('vehicles.destroy', $vehicle->id);
    
            //     return '<div class="d-flex">
            //                 <a href="'. $editUrl .'" class="edit-button btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
            //                 <form method="POST" action="' . $deleteUrl . '" style="display: inline-block;">
            //                     ' . csrf_field() . method_field('DELETE') . '
            //                     <button type="submit" class="delete-button btn btn-danger shadow btn-xs sharp">
            //                         <i class="fa fa-trash"></i>
            //                     </button>
            //                 </form>
            //             </div>';
            // })
            // ->rawColumns(['action'])
            
        }
        
        return $dataTable->render('admin.students.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes  = AcademyClass::all();
        $sections = Section::all();
        $stopages = Stopage::all();

        if(Auth::check()) {
            return view("admin.students.create", compact("classes", "sections", "stopages"));
        }
        else {
            return view("online-admission", compact("classes", "sections", "stopages"));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // // Validate the incoming request data
        // $validatedData = $request->validate([
        //     'student_image' => 'nullable|image|mimes:jpeg,png',
        //     'student_id' => 'required|unique:students,student_id',
        //     'roll' => 'required|string',
        //     'student_name' => 'required|string',
        //     'father_name' => 'required|string',
        //     'mother_name' => 'required|string',
        //     'address' => 'required|string',
        //     'phone1' => 'required|string',
        //     'phone2' => 'nullable|string',
        //     'gender' => 'required|in:male,female',
        //     'dob' => 'required|date',
        //     'remarks' => 'nullable|string',
        // ]);

        // Create a new student record
        $student = new Student();
        // Handle image upload
        if ($request->hasFile('student_image')) {
            $student->student_image = $request->file('student_image')->store('public/images');
        }

        $student->student_id = time();
        $student->roll = $request->roll;
        $student->student_name = $request->student_name;
        $student->father_name = $request->father_name;
        $student->mother_name = $request->mother_name;
        $student->address = $request->address;
        $student->phone1 = $request->phone1;
        $student->phone2 = $request->phone2;
        $student->gender = $request->gender;
        $student->dob = $request->dob;
        $student->remarks = $request->remarks;
        $student->academy_class_id = $request->class_id;
        // Save the student record
        $student->save();

        $admission_fees = new Fees();
        $admission_fees->student_id = $student->id;
        $admission_fees->payment_amount = 50;
        $admission_fees->payment_for = "admission";
        $admission_fees->payment_mode = "offline";
        $admission_fees->payment_date = date('Y-m-d');
        $admission_fees->save();

        if($request->collect_monthly_fees) {
            $stopage = Stopage::find($request->pickup_point);

            $currentDate = new DateTime();
            $currentDate->modify('+'. $request->number_of_months. 'months');

            $monthly_fees = new Fees();
            $monthly_fees->student_id = $student->id;
            $monthly_fees->payment_amount = $stopage->fare * $request->number_of_months;
            $monthly_fees->payment_for = "monthly";
            $monthly_fees->payment_mode = "offline";
            $monthly_fees->payment_date = date('Y-m-d');
            $monthly_fees->from_date = $request->reserve_from;
            $monthly_fees->to_date = $currentDate->format('Y-m-d');
            $monthly_fees->save();
        }

        $student_discount = new Discount();
        $student_discount->student_id = $student->id;
        $student_discount->amount = 0;
        $student_discount->type = null;
        $student_discount->is_active = false;
        $student_discount->save();

        // Optionally, you can redirect to a success page or return a response
        return redirect()->route('students.index')->with('success', 'Student record created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $last_payment = Fees::where(["student_id" => $student->id, "payment_for" => "monthly"])->latest()->first();

        $student = DB::table("seat_reservations")
                    ->select("students.id as student_id", 
                            "students.student_name as student_name", 
                            "stopages.name as stopage_name", 
                            "stopages.fare as stopage_fare",
                            "discounts.amount as discount_amount",
                            "discounts.type as discount_type",
                            "discounts.is_active as discount_is_active",
                            )
                    ->join("students", "students.id", "=", "seat_reservations.student_id")
                    ->join("stopages", "stopages.id", "=", "seat_reservations.stopage_id")
                    ->join("discounts", "discounts.student_id", "=", "students.id")
                    ->where("students.id", $student->id)
                    ->first();

                    return response()->json(["student" => $student, "last_payment" => $last_payment]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }

    public function check_seat(Request $request)
    {
        $class_id = $request->class_id;
        $stopage_id = $request->stopage_id;

        if($class_id <= 8) {
            $data = DB::table("vehicles")
            ->select("vehicles.*")
            ->join("vehicle_stopages", "vehicles.id", "=", "vehicle_stopages.vehicle_id")
            ->where(["vehicles.department" => "primary", "vehicle_stopages.stopage_id" => $stopage_id])
            ->get();
        }
        else {
            $data = DB::table("vehicles")
            ->select("vehicles.*")
            ->join("vehicle_stopages", "vehicles.id", "=", "vehicle_stopages.vehicle_id")
            ->where(["vehicles.department" => "high", "vehicle_stopages.stopage_id" => $stopage_id])
            ->get();
        }

        $remaining_seats = $data[0]->seats - count($data);

        return response()->json($data[0]);
    }
}
