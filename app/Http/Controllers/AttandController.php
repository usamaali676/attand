<?php

namespace App\Http\Controllers;

use App\Models\Attandance;
use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AttandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $srno = 1;
        $user = User::all();
        $atnd = Attandance::all();
        return view('detail', compact('atnd', 'srno','user' ));
    }
    public function get_user($id){
        $atd = Attandance::where('user_id', $id)->get();
        return response()->json($atd);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->type == 'CheckIn'){
            $date = Carbon::now()->format('Y-m-d');
            $chin = Attandance::where('user_id', $request->user_id)->where('date', $date)->value('timein');
            $lastcheck = Attandance::where('user_id', $request->user_id)->where('date' , NULL)->count();
            if(Carbon::now()->format('h:i:s') >= '08:00:00')
            {
                $late = 1;
            }
            else{
                $late = 0;
            }
            if($lastcheck >= 1){
                Alert::error('oops', 'Please Checkout your Last day');
                return redirect()->route('welcome');
            }
            if($chin != ""){

                Alert::error('opps!', 'You Already Check-In For Today ');
                return redirect()->route('welcome');
            }
            else{
            Attandance::insert([
                'user_id' => $request->user_id,
                'date' => Carbon::now()->format('Y/m/d'),
                'timein' => Carbon::now()->format('h:i:s'),
                'late' => $late,
            ]);
            Alert::success('Success' ,'You are Checked-In Now. Have a Good Day!');
            return redirect()->route('welcome');
        }
    }
        if($request->type == 'CheckOut'){
            $date = Carbon::now()->format('Y-m-d');
            $clockcheck = Attandance::where('user_id', $request->user_id)->where('timeout', NULL)->value('date');
            $hasout = Attandance::where('user_id', $request->user_id)->where('date' , $date)->value('timeout');
            $timein = Attandance::where('user_id', $request->user_id)->where('date', $date)->value('timein');
            $timeout = Carbon::now()->format('h:i:s');
            if($timein == ""){
                Alert::error('opps', 'Please CheckIn first for today');
                return redirect()->route('welcome');
            }
            else{
            $in = Carbon::createFromFormat('h:i:s',$timein);
            $out =  Carbon::createFromFormat('h:i:s',$timeout );
            $totaltime =  $in->diffAsCarbonInterval($out);
            }
            if($hasout != ""){
                Alert::error('opps!','You Alredy Check-Out for Today');
                return redirect()->route('welcome');
            }
            else
            {
            if($clockcheck == null)
            {
                Alert::error('opps', 'Please CheckIn first for today');
                return redirect()->route('welcome');
            }
            else
            {
                Attandance::where('user_id', $request->user_id)->where('date', $clockcheck)->update([
                    'timeout' => Carbon::now()->format('h:i:s'),
                    'workhours' => $totaltime,
                ]);
                Alert::success('Success', 'You Are Checked-Out Now. Good Bye!');
                return redirect()->route('welcome');
            }
        }

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attandance  $attandance
     * @return \Illuminate\Http\Response
     */
    public function show(Attandance $attandance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attandance  $attandance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attandance $attandance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attandance  $attandance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attandance $attandance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attandance  $attandance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attandance $attandance)
    {
        //
    }
}
