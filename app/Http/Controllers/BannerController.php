<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use DB;
// use App\Models\Banner;

class BannerController extends Controller
{
    public function index(){
        $banners = DB::table('banners')->get();
        return view('banner.index',['banners' =>$banners]);
    }

    public function create(){
       return view ('banner.create');
    }
    public function store(Request $request){

        $check_position_exists['position']    = $request->position;
        if($check_position_exists){
            $check_position =DB::table('banners')->where('type',$request->type)->where('position', $request->position)->get();
            if($check_position->isEmpty()){
                if($request->hasFile('banner_img')){
                   $file = $request->file('banner_img');
                   $extension  = $file->getClientOriginalExtension();
                   $filename = time().'.'.$extension;
                   $file->move('uploads/Banner/',$filename);
                   $path = 'uploads/Banner/'.$filename;
                 }
                DB::table('banners')->Insert([
                        'banner_img' => $path,
                        'position' => $request->position,
                        'type' => $request->type,
                ]);

            }else{
               return redirect()->back()->with('error', 'Position Already Exists. Please Chanage the Posotion Or Type:)');
            }
        }
         return redirect('/banner.index')->with('success', 'Banner Store Successfully :)');

    }
    public function edit($id) {
        $banners = DB::table('banners')->where('id',$id)->first();
        return view('banner.edit',compact('banners'));
    }
    public function update(Request $request,$id){
        $banner = DB::table('banners')->where('id',$id)->first();
        // $check_position_exists =DB::table('banners')->where('position',$request->position)->first();
        // if($check_position_exists){
        //     return redirect()->back()->with('error', 'Position Already Exists. Please Chanage the Posotion :)');

        // }
        $image = $banner->banner_img;
        $update_data['position']    = $request->position;
        $update_data['type']    = $request->position;
        if($request->hasFile('banner_img')){
            if(File::exists($image)){
                File::delete($image);
            }
            $file = $request->file('banner_img');
            $extension  = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/Banner/',$filename);
            $path = 'uploads/Banner/'.$filename;
            $update_data['banner_img']  = $path;
        }
        DB::table('banners')->where('id',$id)->update($update_data);


     return redirect('/banner.index')->with('success', 'Banner Updated Successfully :)');

    }


    public function destroy(Request $request){
        $id = $request->id;
        $banner = DB::table('banners')->where('id',$id)->first();
        $image = $banner->banner_img;
        // $old_pic_path = 'uploads/Banner/'.$image;
        if(File::exists($image)){
            File::delete($image);
        }
        $banner = DB::table('banners')->where('id',$id)->delete();
        return redirect('/banner.index')->with('success', 'Banner Deleted Successfully :)');


    }
}
