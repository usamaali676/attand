<?php

namespace App\Http\Controllers;

use App\Models\Attandance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();
        $date = Carbon::now()->format('Y-m-d');
        $timein = Attandance::where('user_id', Auth::user()->id)->where('date', $date)->first();
       $late =  Attandance::where('user_id', Auth::user()->id)->whereMonth('created_at', date('m'))->count();
        // $late = Attandance::where('user_id', Auth::user()->id)->where('late', 1)->count();
        return view('home', compact('users', 'timein', 'late'));
    }
    public function clock(){

        return view('clock');
    }
    public function home(){
        return view('welcome');
    }
}

