<?php

namespace App\Http\Controllers;

use App\Models\Symptom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class SymptomController extends Controller
{
    public function index()
    {
        $symptoms = Symptom::latest()->paginate(10);
        return view('admin.symptom.index',compact('symptoms'));
    }

    public function create()
    {
        return view('admin.symptom.create');
    }

    public function store(Request $request)
    {
        if(Auth::user()->is_admin == 1){
            $request->validate([
                'name'=>'required|Unique:symptoms',
            ]);
            $symptom=new symptom();
            $symptom->name = $request->name;
            $symptom->save();
            return redirect()->route('symptom.index')->with('success','New symptom has been added successfuly');
        } else {
            return redirect()->back()->with(['warning'=>'Sorry,you ar not authorized']);
        }
    }

    public function edit($id)
    {
        $symptom = Symptom::findOrFail($id);
        return view('admin.symptom.edit',compact('symptom'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>['required',Rule::unique('symptoms')->ignore(request('name'),'name')],
        ]);
        if(Auth::user()->is_admin == 1){
            $symptom = Symptom::findOrFail($id);
            $symptom->name = $request->name;
            $symptom->update();
            return redirect()->route('symptom.index')->with(['success'=>'symptom has been updated successfuly']);
        } else {
            return redirect()->back()->with(['warning'=>'Sorry,you ar not authorized']);
        }
    }

    //soft Delete
    public function softdelete($id)
    {
        $symptom = Symptom::findOrFail($id)->delete();
         return redirect()->route('symptom.index')->with('success', 'symptom Is Moved To Trash');
    }
    //Trash
    public function trash()
    {
        $symptoms = Symptom::onlyTrashed()->latest()->paginate(4);
         return view('admin.symptom.trash',compact('symptoms'));
    }
    //Back from trash
    public function backFromTrash ($id)
    {
        $task = Symptom::onlyTrashed()->where('id',$id)->first()->restore();
         return redirect()->route('symptom.index')->with('success', 'symptom Is Back from trash Successfully');
    }
}
