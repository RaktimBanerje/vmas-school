<?php

namespace App\Http\Controllers;

use App\Models\Stopage;
use App\Models\Vehicle;
use App\Models\VehicleStopage;
use Illuminate\Http\Request;

class VehicleStopageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $vehicles = [];
        $vehicle_data = Vehicle::all();
        $stopages = Stopage::all();

        foreach($vehicle_data as $vehicle) {
            $lists = VehicleStopage::where("vehicle_id", $vehicle->id)->get()->toArray();
            $arr = [];
            foreach($lists as $list) {
                $arr[] = $list['stopage_id'];
            }

            $vehicle->stopages = $arr;
            $vehicles[] = $vehicle;
        }

        return view("admin.vehicle_stopages.index", compact("vehicles", "stopages"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $stopages = $request->stopages;
        $vehicle_id = $request->vehicle_id;
        
        if (empty($stopages)) {
            $stopages = [];
        }

        VehicleStopage::where("vehicle_id", $vehicle_id)->whereNotIn("stopage_id", $stopages)->delete();
       
        foreach($stopages as $stopage) {
            VehicleStopage::create(['vehicle_id' => $vehicle_id, 'stopage_id' => $stopage]);
        }

        return redirect()->route('vehicle-stopages.index')->with('success', 'Vehicle stopage updated successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(VehicleStopage $vehicle)
    {
       
    }

    public function get_vehicle_stopages(Request $request)
    {
        $lists = VehicleStopage::where("vehicle_id", $request->id)->get()->toArray();
        $arr = [];
        foreach($lists as $list) {
            $arr[] = $list['stopage_id'];
        }

        return response()->json($arr);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VehicleStopage $vehicleStopage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VehicleStopage $vehicleStopage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VehicleStopage $vehicleStopage)
    {
        //
    }
}
