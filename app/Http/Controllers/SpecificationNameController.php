<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specname;


class SpecificationNameController extends Controller
{
    public function index(){
        $specname = Specname::all();
        return view('specname.index', compact('specname'));
    }
    public  function create() {
        $specname = Specname::all();
        // return view('specname.index', compact('specname'));
        return view('specname.create',compact('specname'));
    }

     public function store(Request $request) {
        $specname = new Specname;
        $specname->specname=$request->input('specname');
        $specname->status=$request->input('status');
        $specname->save();
        return redirect('/specname.index')->with('success', 'Data Added Successfully');
    }

     public function edit($id){
        $specname = Specname::findOrFail($id);
        return view('specname.edit', compact('specname'));

     }
      public function update(Request $request,$id)
     {
        $specname = Specname::find($id);
        $specname->specname = $request->input('specname');
        $specname->status= $request->input('status');
        $specname->update();
        return redirect('/specname.index')->with('success', 'Data Update Successfully');
     }

    public function delete(Request $request){
        $id = $request->id;
        $specname = Specname::findOrFail($id);
        $specname->delete();
        return redirect('/specname.index')->with('success', 'Data Deleted Successfully');

    }

}
