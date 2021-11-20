<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bikemodel;
use App\Models\Category;
use App\Models\Varient;
use App\Models\Spec;
use DB;



class VarientController extends Controller
{
    public function index(){
        $category = Category::all();
        $model = Bikemodel::all();
        $varient = Varient::all();
        return view('varient.index')->with('category',$category)->with('model',$model)->with('varient',$varient);
    }

    public function create(){
        $category = Category::all();
        $model = Bikemodel::all();
        $varient = Varient::all();
        return view('varient.create')->with('category',$category)->with('model',$model)->with('varient',$varient);
    }

    public function store(Request $request){
        $varient = new Varient;
        $varient->category_id = $request->input('category_id');
        $varient->bikemodel_id= $request->input('bikemodel_id');
        $varient->title= $request->input('title');
        $varient-> description= $request->input('description');
        $varient->save();
        return redirect('/varient.index')->with('success', 'Data Added Successfully');
    }

    public function edit($id){
        $varient = Varient::find($id);
        $category = Category::all();
        $model = Bikemodel::all();
        return view('varient.edit')->with('varient',$varient)->with('model',$model)->with('category',$category);
    }

    public function update(Request $request, Varient $varient){
        // dd($varient);
        // $varient = Varient::find($);
        $varient->category_id = $request->category_id;
        $varient->bikemodel_id= $request->bikemodel_id;
        $varient->title= $request->title;
        $varient-> description= $request->description;
        $varient->save();
        return redirect('/varient.index')->with('success', 'Data Added Successfully');
    }

    public function delete(Request $request){
        $id =  $request->id;
        $varient = Varient::findOrFail($id);
        $varient->delete();
        return redirect('/varient.index')->with('success', 'Data Deleted Successfully');
    }

    public function getspecification($id){
        $varient_id = $id;
        $spectable = DB::table('specnames')->join('specs','specnames.id','=','specs.specname_id')
                   ->where('specs.varient_id',$varient_id)->get();
        // print("<pre>");print_r($spectable);die;
        $vari =  Varient::all();
        $specifications = DB::table('specnames')->select('id','specname')->get();
        $specname = DB::table('specs')
                        ->select('specs.id as speval_id','specs.specname_id','specs.value')->join('specnames','specnames.id','=','specs.specname_id')
            ->where('specs.varient_id',$varient_id)->get();
        if(count($spectable) == 0){
            $page_type= "add";
        }
        else{
            $page_type= "edit";
        }
         $specification_fields = [];

        foreach($specifications as $key=>$spec)
        {
            $specification_fields[$key]['specid']  = $spec->id;
            $specification_fields[$key]['specname']  = $spec->specname;

            foreach($specname as $specvalues){
                if($spec->id == $specvalues->specname_id){
                    $specification_fields[$key]['speval_id'] = $specvalues->speval_id;
                    $specification_fields[$key]['value'] = $specvalues->value;
                }
            }
        }

        // print("<pre>");print_r($specification_fields);die;


    return view('varient.spec' ,[ 'vari'=> $vari,'varient_id' => $varient_id,'specification_fields' => $specification_fields , 'page_type' =>$page_type]);
    }
    public function getSpecificationDetails(Request $request) {
        $varient_id = $request->varient_id;
        $spectable = DB::table('specnames')->join('specs','specnames.id','=','specs.specname_id')
        ->where('specs.varient_id',$varient_id)->get();
        // print("<pre>");print_r($spectable);die;
        $vari =  Varient::all();
        $specifications = DB::table('specnames')->select('id','specname')->get();
        $specname = DB::table('specs')
                        ->select('specs.id as speval_id','specs.specname_id','specs.value')->join('specnames','specnames.id','=','specs.specname_id')
            ->where('specs.varient_id',$varient_id)->get();
        if(count($spectable) == 0){
            $page_type= "add";
        }
        else{
            $page_type= "edit";
        }
         $specification_fields = [];

        foreach($specifications as $key=>$spec)
        {
            $specification_fields[$key]['specid']  = $spec->id;
            $specification_fields[$key]['specname']  = $spec->specname;

            foreach($specname as $specvalues){
                if($spec->id == $specvalues->specname_id){
                    $specification_fields[$key]['speval_id'] = $specvalues->speval_id;
                    $specification_fields[$key]['value'] = $specvalues->value;
                }
            }
        }
       return $specification_fields;

    }

}
