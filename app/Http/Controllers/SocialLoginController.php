<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
            session(['new_user' => TRUE]);
        }

        $user->name = $fb_name;
        $user->email = $fb_email;
        $user->password = $fb_password;
        $user->role_id = 4;
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
}
