<?php

namespace App\Http\Controllers;
use App\Models\Image;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\File;
use Validator;
use Input;
use App\Models\Product;
use DB;

use Illuminate\Http\Request;

class ImageController extends Controller
{
  public function index(){
    $image = Image::all();
    // dd($image);
    // $product = Product::all();

    return view('image.index',compact('image'));
  }

  public function create(){
    $product = Product::all();
    return view('image.create')->with('product', $product);

  }
  public function store(Request $request)
  {
    $image = array();
    if($file = $request->file('image')){
        foreach($file as $file){
            $image_name = md5(rand(1000,10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $uploade_path = 'uploads/images/';
            $image_url = $uploade_path.$image_full_name;
            $file->move($uploade_path,$image_full_name);
            $image[] = $image_url;
        }
        Image::insert([
            'image' => implode('|', $image),
            'product_id' => $request->product_id,
        ]);
        return redirect('/image.index')->with('success', 'Data Added Successfully');

    }
  }

  public function edit($id){
    $image = Image::find($id);
    $product = Product::all();
    return view('image.edit')->with('image', $image)->with('product', $product);

  }
  public function update(Request $request, $id){
    // $image = image::find($id);
    $image_ori = image::find($id);
    $path = $image_ori->image;
    $imgpath = explode('|', $path);
      foreach($imgpath as $imagepath ){
        if(File::exists($imagepath)){
          File::delete($imagepath);
      }
    }
    $image = array();
    if($file = $request->file('image')){
        foreach($file as $file){
            $image_name = md5(rand(1000,10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $uploade_path = 'uploads/images/';
            $image_url = $uploade_path.$image_full_name;
              if(File::exists($image_url)){
              File::delete($image_url);
          }
            $file->move($uploade_path,$image_full_name);
            $image[] = $image_url;
        }
         DB::table('images')->where('id',$id)->update([
            'image' => implode('|', $image),
            'product_id' => $image_ori->product_id,
        ]);
        return redirect('/image.index')->with('success', 'Data Added Successfully');


    }

  }

  public  function delete(Request $request) {
    $id = $request->id;
    $image = Image::findOrFail($id);
    $path = $image->image;
    $imgpath = explode('|', $path);
      foreach($imgpath as $imagepath ){
        if(File::exists($imagepath)){
          File::delete($imagepath);
      }
      $image ->delete();

    }
    return redirect('/image.index')->with('success', 'Data Deleted Successfully');
  }

}
