<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DeptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $srno = 1;
        $dept = Department::all();
        return view('dept.index', compact('srno','dept'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dept.create');
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
            'name' => 'required|unique:departments'
        ]);
        $add_dept = new Department();
        $add_dept->name = $request->name;
        $add_dept->save();

        Alert::success('Success', 'Department Added Successfully');
        return redirect()->route('dept.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dep = Department::where('id', $id)->first();
        return view('dept.edit', compact('dep'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:departments'
        ]);
        $dept = Department::where('id', $id)->first();
        $dept->update([
            'name' => $request->name,
        ]);
        Alert::success('Success', 'Department Updated Successfully');
        return redirect()->route('dept.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $deletedept = Department::find($request->dept_id);
        $userdept = User::where('dept_id', $deletedept->id)->get();

         if($userdept->count()>0)
         {
            Alert::error('opps!', 'Please Delete child Object First ');
            return redirect()->route('dept.index');
         }
         Department::where('id', $request->dept_id)->delete();
         Alert::success('Sucess', 'Department Deleted Successfully');
         return redirect()->route('dept.index');


    }
}
