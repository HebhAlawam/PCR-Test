<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if(empty($request->all())){
            $users = User::where('is_admin',0)->withCount('reservations')->latest()->paginate(10);

        } elseif ($request->has('newUsers')) { //filter with today users registeration
            $users = User::whereDate('created_at', now()->today())->latest()->paginate(10);
        }

        return view('admin.user.index',compact('users'));
    }

}
