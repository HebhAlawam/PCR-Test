<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Center;
use App\Models\Disease;
use App\Models\Symptom;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class ReservationController extends Controller
{
    ### all or filtered reservation - admin ###
    public function all(Request $request)
    { 
        if(Auth::user()->is_admin == 1){
            if(empty($request->all())){ //all
                $reservations = Reservation::latest()->paginate(10);
            } elseif ($request->has('processingRev')) { //filter processing res
                $reservations = Reservation::where('result',Null)->whereDate('appointment','<',Carbon::now()->toDateTimeString())->latest()->paginate(10);
            } elseif ($request->has('todayRev')) { //leatest 
                $reservations = Reservation::whereDate('created_at', now()->today())->latest()->paginate(10);
            } elseif ($request->has('positiveRev')) { //filter positive res
                $reservations = Reservation::where('result',1)->latest()->paginate(10);
            } 
            return view('admin.reservation.all',compact('reservations'));

        } else {
            return redirect()->back()->with(['warning'=>'Sorry,you are not authorized']);
        }
    }

    ### show details for specific reservation - admin ###
    public function show($id)
    { 
        $reservation = Reservation::latest()->findOrFail($id);
        if(Auth::user()->is_admin == 1){
            return view('admin.reservation.show',compact('reservation'));
        } else {
            return redirect()->back()->with(['warning'=>'Sorry,you ar not authorized']);
        }
    }

    ### update reservation resulte - admin ###
    public function update(Request $request)
    { 
        if(Auth::user()->is_admin == 1 ){
            $reservation = Reservation::latest()->findOrFail($request->id);
            if($reservation->appointment > Carbon::now()){
                return redirect()->back()->with(['warning'=>'Sorry, You cannot change the resulte for this reservation yet']);
            } else {
                $reservation->result = ($request->result === "NULL") ? NULL : $request->result;
                $reservation->update();
                return redirect()->back()->with(['success'=>'The resulte updated successfully']);
            }
        } else {
            return redirect()->back()->with(['warning'=>'Sorry,you are not authorized']);
        }
    }



}
