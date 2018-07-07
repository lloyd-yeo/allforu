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

        $relation = FollowRelation::where('user_id', Auth::user()->id)
            ->where('followable_id', $club->id)
            ->where('relation', 'subscribe')
            ->first();

        $events = Event::where('club_id', $club_id);
        return view('clubs.wall', [ 'club' => $club, 'events' => $events, 'join_request' => $relation ]);
    }

    public function addRequestToJoin(Request $request, $club_id) {
        $club = Club::find($club_id);
        if ($club == NULL) {
            return redirect()->back();
        }
        $user = User::find(Auth::user()->id);
        $user->subscribe($club);

        return redirect()->action('ClubController@showWall', ['club_id' => $club->id]);
    }
}
