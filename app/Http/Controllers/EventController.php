<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Session;
use DB;

class EventController extends Controller
{
    public function index()
    {
        $events = [];
        $data = Event::all();
        if($data->count())
         {
            foreach ($data as $key => $value) 
            {
                $events[] = Calendar::event(
                    $value->eventname,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.'+1 day'),
                    $value->id,
                 [
                     'color' => $value->color,
                 ]
                );
            }
        }
        
        $calendar = Calendar::addEvents($events);
        return view('admin.calendarpage', compact('calendar'));

    }

    public function display()
    {
        return view('admin.addevent');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'eventname' => 'required',
            'color' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $events = new Event;

        $events->eventname = $request->input('eventname');
        $events->color = $request->input('color');
        $events->start_date = $request->input('start_date');
        $events->end_date = $request->input('end_date');

        $events->save();

        Session::flash('success', "Event add successful!");
        return redirect()->route('showCalendar');

    }

    public function show(Request $request)
    {
        $events = Event::all();
        return view('admin.eventlist')->with('events', $events);
    }

    public function edit($id)
    {
        $events = Event::find($id);
        return view('admin.editevent', compact('events','id'));
    }    

    public function update()
    {
        $r=request();
        $events = Event::where('id', $r->get('id')) 
        ->update([
            'eventname' => $r->get('eventname'),
            'color' => $r->get('color'),
            'start_date' => $r->get('start_date'),
            'end_date' => $r->get('end_date')
        ]);

        Session::flash('success', "Event update successful!");
        return redirect()->route('showEventList');

    }

    public function delete($id) 
    {
        $events = Event::find($id);
        $events->delete();

        Session::flash('success', "Event deleted!");
        return redirect()->route('showEventList');
        
    }

    public function searchDate()
    {
        $request = request();
        $keyword = $request->searchdate;
        $events = DB::table('events')
        ->where('start_date', 'like', '%' .$keyword. '%')
        ->orWhere('end_date', 'like', '%' .$keyword. '%')
        ->get();

        return view('admin.eventlist')->with('events', $events);
    }

    public function search()
    {
        $request = request();
        $keyword = $request->search;
        $events = DB::table('events')
        ->where('eventname', 'like', '%' .$keyword. '%')
        ->orWhere('start_date', 'like', '%' .$keyword. '%')
        ->get();

        return view('admin.eventlist')->with('events', $events);
    }

    /* function for employee */

    public function emp_calendar_index()
    {
        $events = [];
        $data = Event::all();
        if($data->count())
         {
            foreach ($data as $key => $value) 
            {
                $events[] = Calendar::event(
                    $value->eventname,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.'+1 day'),
                    $value->id,
                 [
                     'color' => $value->color,
                 ]
                );
            }
        }
        
        $calendar = Calendar::addEvents($events);
        return view('employee.calendarpage', compact('calendar'));
    }

    public function emp_calendar_show(Request $request)
    {
        $events = Event::all();
        return view('employee.eventlist')->with('events', $events);
    }

    public function emp_calendar_searchDate()
    {
        $request = request();
        $keyword = $request->searchdate;
        $events = DB::table('events')
        ->where('start_date', 'like', '%' .$keyword. '%')
        ->orWhere('end_date', 'like', '%' .$keyword. '%')
        ->get();

        return view('employee.eventlist')->with('events', $events);
    }

    public function emp_calendar_search()
    {
        $request = request();
        $keyword = $request->search;
        $events = DB::table('events')
        ->where('eventname', 'like', '%' .$keyword. '%')
        ->orWhere('start_date', 'like', '%' .$keyword. '%')
        ->get();

        return view('employee.eventlist')->with('events', $events);
    }

}
