<?php

namespace App\Http\Controllers;

use App\Club;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard() {
        if (session()->exists('new_user')) {
            if (session('new_user') == TRUE || Auth::user()->school_email == NULL) {
                return redirect()->action('HomeController@onboarding');
            } else {
                $clubs = Club::all();
                return view('dashboard', ['clubs' => $clubs]);
            }
        }
    }

    public function onboarding() {
        return view('onboarding');
    }

}
