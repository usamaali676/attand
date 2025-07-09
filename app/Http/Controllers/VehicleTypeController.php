<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $srno = 1;
        $vehtype = VehicleType::all();
        return view('vehtype.index', compact('srno','vehtype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehtype.create');
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
            'name' => 'required|unique:vehicle_types,name'
        ]);
        $add_vehtype = new VehicleType();
        $add_vehtype->name = $request->name;
        $add_vehtype->save();
        Alert::success('success', 'VehicleType Added Successfully');
        return redirect()->route('vehicletype.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleType $vehicleType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehtype = VehicleType::where('id' , $id)->first();
        return view('vehtype.edit',compact('vehtype'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        VehicleType::where('id', $request->id)->update([
            'name' => $request->name,
        ]);
        Alert::success('Success', 'VehicleType Added Successfully');
        return redirect()->route('vehicletype.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete_type = VehicleType::find( $request->type_id);
        $vehicount = Vehicle::where('type_id', $delete_type->id)->get();
        if($vehicount->count()>0)
        {
            Alert::error('oops', 'Please remove the Child Item First');
            return redirect()->route('vehicle.index');
        }
        else
        {
            $vehtype = VehicleType::all();
            if($vehtype->count()==1)
            {
                Alert::error('oops', 'This Action Can not Perform! Minimun 1 Vehicle Type Required');
                return redirect()->route('vehicletype.index');
            }
            else
            {
                VehicleType::where('id', $request->type_id)->delete();
                Alert::success('Success' , 'Vehicle Type Deleted Successfully');
                return redirect()->route('vehicletype.index');
            }
        }

    }
}
