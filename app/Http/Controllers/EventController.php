<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function showWall(Request $request, $event_id) {

        $event = Event::find($event_id);
        if ($event == NULL) {
            return redirect()->back();
        }

        return view('events.show', [ 'event' => $event ]);
    }
}
