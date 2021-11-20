<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductSeason;
use App\Models\Product;

use DB;

class UpdateSeasonController extends Controller
{
    public function index(){
        $updateseason = DB::table('product_season')
                            ->join('seasons','product_season.season_id','=','seasons.id')
                            ->join('products','product_season.product_id','=','products.id')
                            ->select('product_season.id','seasons.season_name','products.name')
                            ->get();
        //  print("<pre>");print_r($updateseason);die;
        return view('update-season.index',['updateseason'=>$updateseason]);
    }

    public function create(){
    $updateseason = DB::table('seasons')->get();
    $product = DB::table('products')->get();
    // dd($product);
     return view('update-season.create',['updateseason'=>$updateseason,'product'=>$product]);
    }

    public function store(Request $request){
      $updateseason = array();
        $updateseason['season_id'] = $request->season_id;
        $updateseason['product_id'] = $request->product_id;

        DB::table('product_season')->Insert($updateseason);
        return redirect('/update-season.index')->with('success', ' Season Inserted Successfully ');
        }
    public function delete(Request $request){
        $id = $request->id;
        DB::table('product_season')->where('id',$id)->delete();
        return redirect('/update-season.index')->with('success', ' Season Deleteds Successfully ');
    }

}
