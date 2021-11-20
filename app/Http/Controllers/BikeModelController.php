<?php

namespace App\Http\Controllers;
use App\Models\Bikemodel;
use App\Models\Category;
use DB;
use File;


use Illuminate\Http\Request;

class BikeModelController extends Controller
{
    public function index(){
        $category = Category::all();
         $model = Bikemodel::all();
        return view('model.index')->with('category',$category)->with('model',$model);
    }

    public function create(){
        $category = Category::all();
        $model = Bikemodel::all();
       return view('model.create')->with('category',$category)->with('model',$model);
    }

    public function store(Request $request){

    $request->validate([
        "file" => "required|mimes:pdf|max:10000",
    ]);

    $model['category_id'] = $request->category_id;
    $model['title'] = $request->title;
    $model['seo_title'] = $request->seo_title;
    $model['seo_tag'] = $request->seo_tag;
    $model['seo_desc'] = $request->seo_desc;
    $model['description'] = $request->description;

    // $model->category_id = $request->input('category_id');
    // $model->title= $request->input('title');
    // $model->seo_title= $request->input('seo_title');
    // $model->seo_tag= $request->input('seo_tag');
    // $model->seo_desc= $request->input('seo_desc');
    // $model-> description= $request->input('description');
    if($request->hasFile('file')){
        $file = $request->file('file');
        $extension  = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/file/',$filename);
        $path = 'uploads/file/'.$filename;
        $model['file']  = $path;
    }
    DB::table('bikemodels')->Insert($model);
    return redirect('/model.index')->with('success', 'Data Added Successfully');

    }

    public function edit($id){
        $model = Bikemodel::find($id);
        $categorys = Category::all();
        return view('model.edit',['model' => $model,'categorys' => $categorys]);
    }

     public function update(Request $request,$id)
    {
        // dd($request->all());

         $model =  Bikemodel::find($id);
        $file = $model->file;
        $model['category_id'] = $request->category_id;
        $model['title'] = $request->title;
        $model['seo_title'] = $request->seo_title;
        $model['seo_tag'] = $request->seo_tag;
        $model['seo_desc'] = $request->seo_desc;
        $model['description'] = $request->description;
        if($request->hasFile('file')){
                if(File::exists($file)){
                File::delete($file);
            }
                $file = $request->file('file');
                $extension  = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('uploads/file/',$filename);
                $path = 'uploads/file/'.$filename;
                $model['file']  = $path;

         }
        //   DB::table('bikemodels')->where('id',$id)->update($model);
              $model->save();
        return redirect('/model.index')->with('success', 'Data Updated Successfully');
    }

    public function delete(Request $request){
        $id = $request->id;
        $model = Bikemodel::find($id);
        $file = $model->file;
        if(File::exists($file)){
            File::delete($file);
        }
        $model->delete($id);
        return redirect('/model.index')->with('success', 'Data Deleted Successfully');
    }

}
