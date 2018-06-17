<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

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
}
