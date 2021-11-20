<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SeasonController extends Controller
{
     public function index()
    {
        $seasons = DB::table('seasons')->get();
        return view('season.index',['seasons' =>$seasons]);
    }
    public function create(){
        return view('season.create');
    }

    public function store(Request $request){

        // $season = array();
        // $season['season_name'] = $request->season_name;
        // $season['description'] = $request->description;
        // $season['b_position'] = $request->b_position;
        // $season['i_position'] = $request->i_position;
        DB::table('seasons')->Insert([
            'season_name' =>$request->season_name,
            'description' => $request->description,
            'b_position' => $request->b_position,
            'i_position' => $request->i_position
        ]);
        return redirect('/season.index')->with('success', ' Season Inserted Successfully ');

    }

    public function edit($id){
        $seasons = DB::table('seasons')->where('id',$id)->first();
        return view('season.edit',compact('seasons'));

    }

    public function update(Request $request,$id){
        DB::table('seasons')->where('id',$request->id)->update([
            'season_name' =>$request->season_name,
            'description' => $request->description,
            'b_position' => $request->b_position,
            'i_position' => $request->i_position
        ]);
        return redirect('/season.index')->with('success', ' Season Updated Successfully ');

    }

    public function delete(Request $request){
        $id = $request->id;
        DB::table('seasons')->where('id',$id)->delete();
        // $seasons = DB::table('seasons')->where('id',$id)->get();
        // $seasons -> delete();
        return redirect('/season.index')->with('success', ' Season Deleteds Successfully ');




    }
}
