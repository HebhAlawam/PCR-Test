<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;



// dashbord
class AdminController extends Controller
{
    public function dashboard()
    {
        $processingRev = Reservation::where('result',Null)->whereDate('appointment','<',Carbon::now()->toDateTimeString())->count();
        $positiveRev = Reservation::where('result',1)->count();
        $todayRev = Reservation::whereDate('created_at', now()->today())->count();
        $newUsers = User::whereDate('created_at', now()->today())->count();
        return view('admin.dashboard',compact(['processingRev','todayRev','newUsers','positiveRev']));
    }
}
