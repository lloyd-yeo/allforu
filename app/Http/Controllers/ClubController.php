<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use App\Club;

class ClubController extends Controller
{
    public function showProfile(Request $request) {
        return view('clubs.profile');
    }

    public function showWall(Request $request, $club_id) {
        $club = Club::find($club_id);
        if ($club == NULL) {
            return redirect()->back();
        }
        $events = Event::where('club_id', $club_id);
//        $users =
        return view('clubs.wall', [ 'club' => $club, 'events' => $events ]);
    }
}
