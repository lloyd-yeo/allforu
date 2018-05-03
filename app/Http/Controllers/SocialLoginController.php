<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class SocialLoginController extends Controller
{
    public function login(Request $request) {
        $fb_id = $request->input('id');
        $fb_access_token = $request->input('access_token');
        $fb_name = $request->input('name');
        $fb_email = $request->input('email');
        $fb_profile_pic = $request->input('picture');
        $fb_password = 'fb';

        $user = User::where('email', $fb_email)->first();

        if ($user == NULL) {
            $user = new User;
            $user->name = $fb_name;
            session(['new_user' => TRUE]);
        } else {
            session(['new_user' => FALSE]);
        }

        $user->email = $fb_email;
        $user->password = $fb_password;
        $user->role_id = 1;
        $user->fb_access_token = $fb_access_token;
        $user->fb_id = $fb_id;
        $user->fb_profile_pic = $fb_profile_pic;
        if ($user->save()) {
            Auth::login($user);
            return response()->json(['success' => TRUE, 'message' => 'Successfully logged in user!']);
        } else {
            return response()->json(['success' => FALSE, 'message' => 'Failed to authenticate user.']);
        }
    }

    public function registration(Request $request) {
        $user = User::find(Auth::user()->id);
        $user->name = $request->input('name');
        $user->school_email = $request->input('school_email');
        $user->contact = $request->input('contact');
        $user->school_id = $request->input('school_id');
        $user->year_of_study = $request->input('year_of_study');
        $user->matric_no = $request->input('matric_no');
        $user->student_leader = $request->input('student_leader');
        $user->food_pref = $request->input('food_pref');
        $user->food_allergy = $request->input('food_allergy');
        $user->shirt_size = $request->input('shirt_size');
        $user->side_income_interest = $request->input('side_income_interest');
        $user->event_interest = $request->input('event_interest');
        $user->save();
        session(['new_user' => FALSE]);
        return redirect()->action('HomeController@dashboard');
    }
}
