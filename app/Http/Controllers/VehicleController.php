<?php

namespace App\Http\Controllers;

use App\Models\vehicle;
use App\Models\VehicleType;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $srno = 1;
        $veh = vehicle::all();
        return view('vehicle.index', compact('veh', 'srno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicletype = VehicleType::all();
        return view('vehicle.create', compact('vehicletype'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'number'=> 'required'
        ]);
        $add_veh = new Vehicle();
        $add_veh->type_id = $request->type_id;
        $add_veh->number = $request->number;
        $add_veh->description = $request->description;
        $add_veh->save();
        Alert::success('Success', 'Vehicle Added Succesfully');
        return redirect()->route('vehicle.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::where('id', $id)->first();
        $selectveh = VehicleType::where('id', $vehicle->type_id)->first();
        $vehtype = VehicleType::all();
        return view('vehicle.edit', compact('selectveh','vehtype', 'vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vehicle $vehicle)
    {
        $request->validate([
            'number' => 'required'
        ]);
        vehicle::where('id', $request->id)->update([
            'type_id' => $request->type_id,
            'number' => $request->number,
            'description' => $request->description,
        ]);
        Alert::success('Success', 'Vehicle Updated Successfully');
        return redirect()->route('vehicle.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $deleteveh = Vehicle::find($request->veh_id);
        $userVeh = User::where('vehicle_id', $deleteveh->id)->get();
        if($userVeh->count()>0)
        {
            Alert::error('Oops', 'Please delete the Child First');
            return redirect()->route('vehicle.index');
        }
        else
        {
            Vehicle::where('id', $request->veh_id)->delete();
            Alert::success('Success', 'Vehicle Deleted Successfully');
            return redirect()->route('vehicle.index');
        }
    }
}
