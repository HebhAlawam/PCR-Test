<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class DiseaseController extends Controller
{
    public function index()
    {
        $diseases = Disease::latest()->paginate(10);
        return view('admin.disease.index',compact('diseases'));
    }

    public function create()
    {
        return view('admin.disease.create');
    }

    public function store(Request $request)
    {
        if(Auth::user()->is_admin == 1){
            $request->validate([
                'name'=>'required|Unique:diseases',
            ]);
            $disease=new disease();
            $disease->name = $request->name;
            $disease->save();
            return redirect()->route('disease.index')->with('success','New disease has been added successfuly');
        } else {
            return redirect()->back()->with(['warning' , 'Sorry,you ar not authorized']);
        }
    }

    public function edit($id)
    {
        $disease = Disease::findOrFail($id);
        return view('admin.disease.edit',compact('disease'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>['required',Rule::unique('diseases')->ignore(request('name'),'name')],
        ]);
        if(Auth::user()->is_admin == 1){
            $disease = Disease::findOrFail($id);
            $disease->name = $request->name;
            $disease->update();
            return redirect()->route('disease.index')->with(['success'=>'disease has been updated successfuly']);
        } else {
            return redirect()->back()->with(['warning' , 'Sorry,you ar not authorized']);
        }
    }

    //soft Delete
    public function softdelete($id)
    {
        $disease = Disease::findOrFail($id);
        $disease->delete();
        return redirect()->back()->with(['success'=>'The disease Is Moved To Trash']);
    }
    //Trash
    public function trash()
    {
        $diseases = Disease::onlyTrashed()->latest()->paginate(4);
         return view('admin.disease.trash',compact('diseases'));
    }
    //Back from trash
    public function backFromTrash ($id)
    {
        $task = Disease::onlyTrashed()->where('id',$id)->first()->restore();
         return redirect()->route('disease.index')->with('success', 'disease Is Back from trash successfully');
    }
}
