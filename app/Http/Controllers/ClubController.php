<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function show(Request $request) {
        return view('clubs.profile');
    }
}
