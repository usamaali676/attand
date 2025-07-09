<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $srno =1;
        $roles = Roles::all();
        return view('roles.index', compact('roles', 'srno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('roles.create');
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
            'name' => 'required|unique:roles'
        ]);
        $add_role = new Roles();
        $add_role->name = $request->name;
        $add_role->save();
        Alert::success('Success','Role Added successfully');
    	return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show(Roles $roles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $role = Roles::where('id', $id)->first();
        return view('roles.edit', compact('role'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'unique:roles,name,'.$id,
        ]);

        $role = Roles::where('id',$request->id)->first();
        $role->update([
            'name'=>$request->name,
        ]);
        Alert::success('Success', 'Role Updated Successfully');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $deleteRole = Roles::find($request->role_id);

        $userData = User::where('role_id',$deleteRole->id)->get();
        // dd($userData);
        if($userData->count()>0)
        {
            // dd(true);
            Alert::error('opps!', 'Please Delete child Object First ');
            return redirect()->route('roles.index');
        }
        //dd($deleteRole);

        else {
            $role = Roles::all();
            if ($role->count()==1) {
                Alert::error('Opps!','This Action Can not Perform! Minimun 1 Role Required');
                return redirect()->back();
            }
            else{
                Roles::where('id',$request->role_id)->delete();
                Alert::success('Success', 'Role Deleted Successfully');
                return redirect()->route('roles.index');
            }
        }
    }
}
