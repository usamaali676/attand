<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class DesigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $srno = 1;
        $desg = Designation::all();
        return view('designation.index', compact('desg', 'srno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('designation.create');
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
            'name' => 'required|unique:designations',
        ]);
        $add_desg = new Designation();
        $add_desg->name = $request->name;
        $add_desg->save();
        Alert::success('Success', 'Designation is Added Successfully');
        return redirect()->route('desg.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function show(Designation $designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $desg = Designation::where('id', $id)->first();
        return view('designation.edit', compact('desg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:designations,name,'.$id,
        ]);
        $desg = Designation::where('id', $request->id)->first();
        $desg->update([
            'name' => $request->name,
        ]);
        Alert::success('Success', 'Designation Updated Successly');
        return redirect()->route('desg.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete_desg = Designation::find($request->desg_id);
        $user_count = User::where('desg_id', $delete_desg->id)->get();
        if($user_count->count()>0)
        {
            Alert::error('OOPS' , 'Please Delete child Object First');
            return redirect()->route('desg.index');
        }
        else
        {
            Designation::where('id', $request->desg_id)->delete();
            Alert::success('Success', 'Designation deleted Successfully');
            return redirect()->route('desg.index');
        }

    }
}
