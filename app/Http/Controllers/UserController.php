<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $srno = 1;
        $user = User::all();

        return view('user.index', compact('srno','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Roles::all();
        $dept = Department::all();
        $desg = Designation::all();
        $veh = Vehicle::all();
        return view('user.add', compact('role','dept', 'desg', 'veh'));
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
            'email' => 'required|unique:users',
            'name'  => 'required',
            'cnic_no' => 'required',
            'gardian_name' => 'required',
            'contact_no' => 'required',
            'off_email' => 'required',
            'pers_email' => 'required',
            'current_address' => 'required',
            'perm_address' => 'required',
            'last_degree' => 'required',
            'vehicle_id' => 'required',
            'emg_name' => 'required',
            'emg_contact_no' => 'required',
            'emg_relation' => 'required',
        ]);
    	$add_user = new User();
    	$add_user->name = $request->name;
    	$add_user->email = $request->email;
    	$add_user->password = Hash::make($request->password);
        $add_user->role_id = $request->role_id;
        $add_user->dept_id = $request->dept_id;
        $add_user->desg_id = $request->desg_id;
        $add_user->gardian_name = $request->gardian_name;
        $add_user->cnic_no = $request->cnic_no;
        $add_user->contact_no = $request->contact_no;
        $add_user->joining_date = $request->joining_date;
        $add_user->off_email = $request->off_email;
        $add_user->pers_email = $request->pers_email;
        $add_user->dob = $request->dob;
        $add_user->current_address = $request->current_address;
        $add_user->perm_address = $request->perm_address;
        $add_user->last_degree = $request->last_degree;
        $add_user->current_degree = $request->current_degree;
        $add_user->vehicle_id = $request->vehicle_id;
        $add_user->emg_name = $request->emg_name;
        $add_user->emg_contact_no = $request->emg_contact_no;
        $add_user->emg_relation = $request->emg_relation;
        $add_user->save();
    	return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $selectedRole = Roles::where('id',$user->role_id)->first();
        $selectdept = Department::where('id',$user->dept_id)->first();
        $selectdesg = Designation::where('id', $user->desg_id)->first();
        $selectveh = Vehicle::where('id', $user->vehicle_id)->first();
        $role = Roles::all();
        $dept = Department::all();
        $desg = Designation::all();
        $veh = Vehicle::all();
        return view('user.edit' , compact('user','selectedRole','role','dept','selectdept', 'desg', 'selectdesg', 'veh', 'selectveh'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'email' => 'unique:users,email,'.$id,
        ]);
        $newpassword = $request->password;
        $user = User::where('id',$request->id)->first();
        if ($request->password != null) {
            $user->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($newpassword),
                'role_id'=> $request->role_id,
                'dept_id'=> $request->dept_id,
                'desg_id' => $request->desg_id,
                'gardian_name' => $request->gardian_name,
                'cnic_no' => $request->cnic_no,
                'contact_no' => $request->contact_no,
                'joining_date' => $request->joining_date,
                'off_email' => $request->off_email,
                'pers_email' => $request->pers_email,
                'dob' => $request->dob,
                'current_address' => $request->current_address,
                'perm_address' => $request->perm_address,
                'last_degree' => $request->last_degree,
                'current_degree' => $request->current_degree,
                'vehicle_id' => $request->vehicle_id,
                'emg_name' => $request->emg_name,
                'emg_contact_no' => $request->emg_contact_no,
                'emg_relation' => $request->emg_relation,
            ]);
        }
        else{
            $user->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'role_id'=> $request->role_id,
                'dept_id'=> $request->dept_id,
                'desg_id' => $request->desg_id,
                'gardian_name' => $request->gardian_name,
                'cnic_no' => $request->cnic_no,
                'contact_no' => $request->contact_no,
                'joining_date' => $request->joining_date,
                'off_email' => $request->off_email,
                'pers_email' => $request->pers_email,
                'dob' => $request->dob,
                'current_address' => $request->current_address,
                'perm_address' => $request->perm_address,
                'last_degree' => $request->last_degree,
                'current_degree' => $request->current_degree,
                'vehicle_id' => $request->vehicle_id,
                'emg_name' => $request->emg_name,
                'emg_contact_no' => $request->emg_contact_no,
                'emg_relation' => $request->emg_relation,
            ]);
        }
    	if ($user) {
            Alert::success('Success','User Updated successfully');
    		return redirect()->route('user.index');
    	}
    	else{
            Alert::error('Opps!','User Not Updated');
    		return redirect()->route('user.index');
    	}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::all();
        if ($user->count()==1) {
            Alert::error('Opps!','This Action Can not Perform! Minimun 1 User Required');
            return redirect()->back();
        }
        else{
            User::where('id',$request->user_id)->delete();
            Alert::success('Success','User Deleted successfully');
            return redirect()->back();
        }
    }
}
