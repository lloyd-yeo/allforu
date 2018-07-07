<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Club;
use Auth;
use App\User;
use Overtrue\LaravelFollow\FollowRelation;
use Carbon\Carbon;

class EventController extends Controller
{
    public function showWall(Request $request, $event_id) {

        $event = Event::find($event_id);
        if ($event == NULL) {
            return redirect()->back();
        }
        $auth_code = NULL;
        $relation = FollowRelation::where('user_id', Auth::user()->id)
            ->where('followable_id', $event->id)
            ->where('relation', 'subscribe')
            ->first();
        if ($relation != NULL) {
            $auth_code = Carbon::parse($relation->created_at)->getTimestamp();
            $auth_code = substr($auth_code, -4);
        }
        $club = Club::find($event->club_id);
        return view('events.show', [ 'event' => $event, 'club' => $club, 'auth_code' => $auth_code ]);
    }

    public function join(Request $request) {
        $event_id = $request->input('event_id');
        $event = Event::find($event_id);
        if ($event == NULL) {
            return redirect()->back();
        }
        $user = User::find(Auth::user()->id);
        $user->subscribe($event);

        $relation = FollowRelation::where('user_id', Auth::user()->id)
            ->where('followable_id', $event->id)
            ->where('relation', 'subscribe')
            ->first();
        if ($relation != NULL) {
            $auth_code = Carbon::parse($relation->created_at)->getTimestamp();
            $auth_code = substr($auth_code, -4);
            $relation->auth_code = $auth_code;
            $relation->save();
        }

        return response()->json([
            'success' => TRUE,
            'message' => 'Successfully joined this event!'
        ]);
    }
}
