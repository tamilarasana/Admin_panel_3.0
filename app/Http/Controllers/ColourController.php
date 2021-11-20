<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Varient;
use App\Models\Bikemodel;
use App\Models\Colour;
use DB;

class ColourController extends Controller
{
    public function bikecolour($product_id){
        // $product_id = $id;
        $check_exist_color = Colour::where('product_id',$product_id);
        if($check_exist_color->exists()){
            $colours = Product::select('products.id','products.bikemodel_id','products.varient_id','colours.colour_name','colour_code','colours.id as colours_id')->join('colours','colours.product_id','=','products.id')->where('products.id',$product_id)->first();
            $page_type= "edit";

        }else{
            $colours = Product::select('id','bikemodel_id','varient_id')->where('products.id',$product_id)->first();
            $page_type= "add";

        }

        // $colour = Product::find($id);
        return view('colour.index', compact('colours','page_type'));
    }

    public function store(Request $request){

        $colour = new Colour;
        $colour->product_id = $request->input('product_id');
        $colour-> varient_id= $request->input('varient_id');
        $colour-> bikemodel_id= $request->input('bikemodel_id');
        $colour-> colour_name= $request->input('colour_name');
        $colour-> colour_code= $request->input('colour_code');
        $colour->save();
        return redirect('/bike.index')->with('success', 'Data Added Successfully');

    }

    public function update(Request $request,$id){
        $colours = Colour::find($id);
        $colours->product_id = $request->input('product_id');
        $colours-> varient_id= $request->input('varient_id');
        $colours-> bikemodel_id= $request->input('bikemodel_id');
        $colours-> colour_name= $request->input('colour_name');
        $colours-> colour_code= $request->input('colour_code');
        $colours->update();
        return redirect('/bike.index')->with('success', 'Data update     Successfully');


    }
}
