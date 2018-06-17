<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Club;
use Auth;
use App\User;

class EventController extends Controller
{
    public function showWall(Request $request, $event_id) {

        $event = Event::find($event_id);
        if ($event == NULL) {
            return redirect()->back();
        }
        $club = Club::find($event->club_id);
        return view('events.show', [ 'event' => $event, 'club' => $club ]);
    }

    public function join(Request $request) {
        $event_id = $request->input('event_id');
        $event = Event::find($event_id);
        if ($event == NULL) {
            return redirect()->back();
        }
        $user = User::find(Auth::user()->id);
        $user->subscribe($event);

        return response()->json([
            'success' => TRUE,
            'message' => 'Successfully joined this event!'
        ]);
    }
}
