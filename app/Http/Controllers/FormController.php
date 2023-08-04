<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use App\Models\Center;
use App\Models\Disease;
use App\Models\Symptom;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function index()
    { //all reservations for auth user
        $reservations = Reservation::where('user_id',Auth::id())->latest()->paginate(10);
        return view('form.index',compact('reservations'));
    }

    public function centers()
    {
         $centers  = Center::latest()->get();
        return view('form.centers',compact('centers'));

    }

    public function formByCenter($center_id)
    {
        $diseases = Disease::latest()->get();
        $symptoms = Symptom::latest()->get();

        $bookedDates = Reservation::select('appointment')
            ->where('center_id',$center_id)
            ->groupBy('appointment')
            ->havingRaw('COUNT(appointment) >= 2')
            ->pluck('appointment')
            ->toArray();

        return view('form.create',compact('diseases','symptoms','center_id','bookedDates'));
    }

    public function store(Request $request)
    { 
      $request->validate([
            'first_name' => 'required|string|min:2',
            'last_name' => 'required|string|min:2',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'birth_day' => 'required|date|before:today',
            'appointment' => 'required|date_format:Y-m-d H:i|after:12 hours',
            'id_num' => 'required|integer',
            'gender' => 'required',
            'center_id' => 'required',
            'diseases' => 'required',
            'symptoms' => 'required',
        ]);
        $res=new reservation();
        $res->user_id = Auth::id();
        $res->center_id = $request->center_id;
        $res->first_name = $request->first_name;
        $res->last_name =$request->last_name ;
        $res->id_num =$request->id_num ;
        $res->email =$request->email;
        $res->phone =$request->phone;
        $res->address =implode("-",$request->address);
        $res->birth_day =$request->birth_day ;
        $res->gender =$request->gender;
        $res->appointment =$request->appointment;

        $res->save();
        $res->diseases()->attach($request->diseases);
        $res->symptoms()->attach($request->symptoms);
        return redirect()->route('form.index')->with('success','Your reservation is created successfully');
    }

    public function show($id)
    {
        $reservation = Reservation::latest()->findOrFail($id);
        if(Auth::id() == $reservation->user_id){
            return view('form.show',compact('reservation'));
        } else {
            return redirect()->back()->with(['warning'=>'Sorry,you are not authorized']);
        }
    }

    public function edit(Form $form)
    {
        
    }

    public function update(Request $request, Form $form)
    {
        //
    }

    public function destroy($id)
    {
        $reservationDate = Reservation::where('id',$id)->pluck('appointment')->first();
        $diffInDays = now()->diffInDays($reservationDate);
        if($diffInDays > 3){
            Reservation::destroy($id);
            return  redirect()->route('form.index')->with(['success'=>'Your appointment canceled successfully.']);
        } else {
            return  redirect()->route('form.index')->with(['warning'=>'Sorry,You cannot cancel the reservation less than two days before the appointment.']);
        }
    }
}
