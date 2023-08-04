<?php

namespace App\Http\Controllers;
use App\Models\Center;
use App\Models\Reservation;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class CenterController extends Controller
{
    public function index()
    {
        $centers = Center::latest()->paginate(10);
        return view('admin.center.index',compact('centers'));
    }

    public function create()
    {
        return view('admin.center.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|Unique:centers',
            'image' =>'required|image' ,
            'cost' =>'required|gt:0', 
            'city' =>'required',
        ]);
        if(Auth::user()->is_admin == 1){
            $file =$request->file('image');
            $ext = $file-> getClientOriginalExtension();
            $fileName = $request->name.time().'.'.$ext;
            $file->move('uploads/images/centers/',$fileName);

            $center=new center();
            $center->name = $request->name;
            $center->image = $fileName;
            $center->city = $request->city;
            $center->cost = $request->cost;

            $center->save();
            return redirect()->route('center.index')->with('success','New center has been added successfuly');
        } else {
            return redirect()->back()->with(['warning'=>'Sorry,you ar not authorized']);
        }
    }

    public function edit($id)
    {
        $center = Center::findOrFail($id);
        return view('admin.center.edit',compact('center'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>['required',Rule::unique('centers')->ignore(request('name'),'name')],
            'cost' =>'required|gt:0', 
            'city' =>'required',
        ]);
        if(Auth::user()->is_admin == 1){
            $center = Center::findOrFail($id);
            if($request->image){
                $path = 'uploads/images/centers/.$center->image'; 
                if($path){  file::delete($path); }
               
                $file =$request->file('image');
                $ext = $file-> getClientOriginalExtension();
                $fileName = time().'.'.$ext;
                $file->move('uploads/images/centers/',$fileName);
            } else {
                $fileName= $center->image;
            }
            $center->name = $request->name;
            $center->image =$fileName;
            $center->city = $request->city;
            $center->update();
            return redirect()->route('center.index')->with(['success'=>'center has been updated successfuly']);
        } else {
            return redirect()->back()->with(['warning'=>'Sorry,you ar not authorized']);
        }
    }

    //soft Delete
    public function softdelete($id)
    {
        $center = Center::findOrFail($id)->delete();
         return redirect()->route('center.index')->with('success', 'center Is Moved To Trash');
    }
    //Trash
    public function trash()
    {
        $centers = Center::onlyTrashed()->latest()->paginate(4);
         return view('admin.center.trash',compact('centers'));
    }
    //Back from trash
    public function backFromTrash ($id)
    {
        $task = Center::onlyTrashed()->where('id',$id)->first()->restore();
         return redirect()->route('center.index')->with('success', 'center Is Back from trash Successfully');
    }

    //all reservations for specific center($id)
    public function reservations($id)
    {
        $reservations = Center::find($id)->reservations()->latest()->paginate(10);
        return view('admin.reservation.all',compact(['reservations']));
    }
}
