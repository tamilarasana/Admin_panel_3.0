<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Spec;
use App\Models\Specname;
use App\Models\Varient;
use DB;



class SpecificationController extends Controller
{
    public  function index()
    {
        $specification = Spec::ALL();
       return view('specification.index', compact('specification'));
    }
    public function create(){
        $product = Product::all();
        $specname = Specname::all();
        return view('specification.create')->with('product', $product)->with('specname', $specname);
       }
    public function store(Request $request){
        // $data = $request->spec;
        // print("<pre>");print_r($request->spec);die;
        // Spec::create($request->spec);
        DB::table('specs')->Insert($request->spec);
        return redirect('/varient.index')->with('success', 'Data Added Successfully');

    }
     public function edit($id)
    {
        $specification = Spec::find($id);
        $product = Product::all();
        $specname = Specname::all();
        return view('specification.edit')->with('specification', $specification)->with('product', $product)->with('specname', $specname);

    }
    public function update(Request $request, $id){
        // dd($request->all());
        Varient::findorfail($id);
        foreach($request->spec as $key=> $spec){
            if(array_key_exists('updatespeval_id',$spec)){
                DB::table('specs')->where('id',$spec['updatespeval_id']['speval_id'])->update(['value'=>$spec['updatespeval_id']['value']]);
            }else{
                DB::table('specs')->Insert($spec);
            }

        }
        // die;
        return redirect('/varient.index')->with('success', 'Data update Successfully');
    }
    public function delete($id){
        $specification = Spec::findOrFail($id);
        $specification->delete();
        return redirect('/specification.index')->with('success', 'Data Deleted Successfully');
    }
}
