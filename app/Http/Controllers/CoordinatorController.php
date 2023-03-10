<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Hall;
use Carbon\carbon;


class CoordinatorController extends Controller
{
    //Get all event
    public function index(Request $request)
    {
        $from = $request->from;
        $to = $request->to;    
        $events = User::join('events', 'events.user_id', '=', 'users.id')
        #->join('halls', 'halls.id', '=', 'events.hall_id')
        ->orderBy('events.event_date','ASC')
        ->whereBetween('event_date', [$from, $to])
        ->get();
        return view('coordinator.events.index', compact('events'));
    }
    public function show($id)
    {
        $event = Event::find($id);

        return view('staff.events.show',compact('event'));
    }
    //Edit event
    public function edit($id){
      $event = Event::find($id);
      return view('staff.events.edit', compact('event'));
    }
    //Update event
    public function update(Request $request, Event $event){
      $request->validate([
        'event' => 'required',
        'hall_id' => 'required',
        'event_date' => 'required',
        'event_time' => 'required'
    ]);
      $event->hall_id = $request->hall_id;
      $event->update($request->all());

      return redirect()->route('events.index')->with('success','Event updated successfully');
    }
    //Delete event
    public function destroy($id)
    {
      $event = Event::find($id)->delete();
      return redirect()->route('events.index')
                      ->with('success','Event deleted successfully');
    }

}
