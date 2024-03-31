<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\DataTables\VehiclesDataTable;
use Yajra\DataTables\Facades\DataTables;

class VehicleController extends Controller
{
    public function index(VehiclesDataTable $dataTable)
    {
        if (request()->ajax()) {
            return DataTables::of(Vehicle::query())
            ->addColumn('action', function ($vehicle) {
                $editUrl = route('vehicles.edit', $vehicle->id);
                $deleteUrl = route('vehicles.destroy', $vehicle->id);
    
                return '<div class="d-flex">
                            <a href="'. $editUrl .'" class="edit-button btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
                            <form method="POST" action="' . $deleteUrl . '" style="display: inline-block;">
                                ' . csrf_field() . method_field('DELETE') . '
                                <button type="submit" class="delete-button btn btn-danger shadow btn-xs sharp">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>';
            })
            ->rawColumns(['action'])
            ->toJson();
        }

        return $dataTable->render('admin.vehicles.index');
    }

    public function create()
    {
        return view('admin.vehicles.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'registration_no' => 'required|string|max:255',
            'identity_no' => 'required|string|max:255',
            'engine_no' => 'required|string|max:255',
            'insurance_valid_upto' => 'required|date',
            'tax_valid_upto' => 'required|date',
            'fitness_valid_upto' => 'required|date',
            'pollution_valid_upto' => 'required|date',
            'permit_valid_upto' => 'required|date',
            'driver_name' => 'required|string|max:255',
            'driver_phone' => 'required|string|max:255',
            'helper_name' => 'required|string|max:255',
            'helper_phone' => 'required|string|max:255',
            'seats' => 'required|integer',
            'department' => 'required|string|max:255',
        ]);

        // If validation fails, redirect back with pre-filled values
        if ($validator->fails()) {
            return back()->withInput($request->all());
        }

        $vehicle = new Vehicle();
        $vehicle->registration_no = $request->input('registration_no');
        $vehicle->identity_no = $request->input('identity_no');
        $vehicle->engine_no = $request->input('engine_no');
        $vehicle->insurance_valid_upto = $request->input('insurance_valid_upto');
        $vehicle->tax_valid_upto = $request->input('tax_valid_upto');
        $vehicle->fitness_valid_upto = $request->input('fitness_valid_upto');
        $vehicle->pollution_valid_upto = $request->input('pollution_valid_upto');
        $vehicle->permit_valid_upto = $request->input('permit_valid_upto');
        $vehicle->driver_name = $request->input('driver_name');
        $vehicle->driver_phone = $request->input('driver_phone');
        $vehicle->helper_name = $request->input('helper_name');
        $vehicle->helper_phone = $request->input('helper_phone');
        $vehicle->seats = $request->input('seats');
        $vehicle->department = $request->input('department');
        
        $vehicle->save();

        return redirect()->route('vehicles.index')->with('success', 'Vehicle created successfully!');
    }

    public function show(Vehicle $vehicle)
    {
        return view('admin.vehicles.show', compact('vehicle'));
    }

    public function edit(Vehicle $vehicle)
    {
        return view('admin.vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'registration_no' => 'required|string|max:255',
            'identity_no' => 'required|string|max:255',
            'engine_no' => 'required|string|max:255',
            'insurance_valid_upto' => 'required|date',
            'tax_valid_upto' => 'required|date',
            'fitness_valid_upto' => 'required|date',
            'pollution_valid_upto' => 'required|date',
            'permit_valid_upto' => 'required|date',
            'driver_name' => 'required|string|max:255',
            'driver_phone' => 'required|string|max:255',
            'helper_name' => 'required|string|max:255',
            'helper_phone' => 'required|string|max:255',
            'seats' => 'required|integer',
            'department' => 'required|string|max:255',
        ]);

        $vehicle->registration_no = $request->input('registration_no');
        $vehicle->identity_no = $request->input('identity_no');
        $vehicle->engine_no = $request->input('engine_no');
        $vehicle->insurance_valid_upto = $request->input('insurance_valid_upto');
        $vehicle->tax_valid_upto = $request->input('tax_valid_upto');
        $vehicle->fitness_valid_upto = $request->input('fitness_valid_upto');
        $vehicle->pollution_valid_upto = $request->input('pollution_valid_upto');
        $vehicle->permit_valid_upto = $request->input('permit_valid_upto');
        $vehicle->driver_name = $request->input('driver_name');
        $vehicle->driver_phone = $request->input('driver_phone');
        $vehicle->helper_name = $request->input('helper_name');
        $vehicle->helper_phone = $request->input('helper_phone');
        $vehicle->seats = $request->input('seats');
        $vehicle->department = $request->input('department');

        $vehicle->save();

        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully!');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully!');
    }
}
