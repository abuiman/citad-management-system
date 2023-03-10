<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Hall;
use Carbon\carbon;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    //Fetch individual event
    public function index()
    {
      $id = Auth::User()->id;
      $events = User::join('events', 'events.user_id', '=', 'users.id')
      #->join('halls', 'halls.id', '=', 'events.hall_id')
      ->orderBy('events.id','DESC')
      ->get()->where('user_id', $id);
      return view('staff.events.index', compact('events'));
    }
    //create events
    public function create()
    {
      $halls = Hall::get();
      return view('staff.events.create', compact('halls'));
    }
    //
    public function store(Request $request)
    {
        $validatedData = $request->validate([
          'event' => 'required',
          'event_date' => 'required|date',
          'event_time' => 'required',
          'event_end_date' => 'required|date|after_or_equal:event_date',
          'event_end_time' => 'required|after_or_equal:event_end_time',
          #'hall_id' => 'required|exists:halls,id',
          'hall_id' => 'required',
        ]);
        $id = Auth::User()->id;
        $start_datetime = Carbon::parse($validatedData['event_date'] . ' ' . $validatedData['event_time']);
        $end_datetime = Carbon::parse($validatedData['event_end_date'] . ' ' . $validatedData['event_end_time']);

        $overlapping_events = Event::where('hall_id', $validatedData['hall_id'])
            ->where(function($query) use ($start_datetime, $end_datetime) {
                $query->where(function($query) use ($start_datetime, $end_datetime) {
                    $query->where('event_date', '<=', $start_datetime)
                        ->where('event_end_date', '>=', $start_datetime);
                })->orWhere(function($query) use ($start_datetime, $end_datetime) {
                    $query->where('event_date', '<', $end_datetime)
                        ->where('event_end_date', '>=', $end_datetime);
                })->orWhere(function($query) use ($start_datetime, $end_datetime) {
                    $query->where('event_date', '>=', $start_datetime)
                        ->where('event_end_date', '<=', $end_datetime);
                });
            })->first();
        
        if ($overlapping_events) {
            return redirect()->back()->withErrors(['hall_id' => 'Selected hall is not available at that time. Please select another hall or time.']);
        }

        $event = new Event;
        $event->user_id = $id;
        $event->event = $validatedData['event'];
        $event->event_date = $start_datetime;
        $event->event_end_date = $end_datetime->subMinutes(5);
        $event->event_time = $request->event_time;
        $event->event_end_time = $request->event_end_time;
        $event->hall_id = $validatedData['hall_id'];
        $event->save();
        return redirect()->route('events.index')->with('success', 'Event created succssfully.');
        #return redirect()->back()->with('success', 'Event created successfully!');
    
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
    //Count
    public function count(){
      $events = Event::get();
      return $events->sum->event;
    }

    //Delete event
    public function destroy($id)
    {
      $event = Event::find($id)->delete();
      return redirect()->route('events.index')
                      ->with('success','Event deleted successfully');
    }
}