<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function showProfile(Request $request) {
        return view('clubs.profile');
    }

    public function showWall(Request $request) {
        return view('clubs.wall');
    }
}
