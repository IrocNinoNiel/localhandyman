<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AppointmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('appointment.index');
    }

    public function submitAppointment(Request $request)
    {
        $this->validate($request,[
            'details'=>'required',
            'hours'=>'required',
            'time'=>'required',
            'date'=>'required',
            'phone_num'=>'required'
        ]);
        
        $appointment = new Appointment;

        $appointment->details = $request->details;
        $appointment->hour_limit = $request->hours;
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->phone_num = $request->phone_num;
        $appointment->user_id = Auth::user()->id;
        $appointment->status = 1;

        $appointment->save();

        // $request->user()->posts()->create([
        //     'details' => $request->details,
        //     'hour_limit' => $request->hours,
        //     'date' => date('mm/dd/yy'),
        //     'time' => $request->time,
        //     'phone_num' => $request->phone_num,
        // ]);

        return Redirect::route('home')->with('success','Appointment Created');

    }

    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        if(is_null($appointment)) abort(404);

        $appointment->status = 2;
        $appointment->save();

        return Redirect::route('home')->with('success','Appointment Has Been Done');

    }
}
