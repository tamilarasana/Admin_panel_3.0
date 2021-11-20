<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\File;
use Toastr;


// use Illuminate\Support\Facades\Validator;
use Validator;
use Input;

class CategoryController extends Controller
{
    public function index(){

            $categorys = Category::all();
            return view('category.index' ,compact('categorys'));

    }
    public function create(){
        return view('category.create');
    }

    public function store(Request $request)
    {
            $category = new Category;
            $category->brand_name = $request->input('brand_name');
            $category-> about_brand= $request->input('about_brand');
            $category-> status = $request->input('status');

            if($request->hasFile('brand_logo')){
                $file = $request->file('brand_logo');
                $extension  = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('uploads/Logo/',$filename);
                $category->brand_logo = $filename;
            }
            $category->save();
            // Toastr::success('Messages in here');
            // Toastr::success('Created successfully :)','Success');
            return redirect('/category.index')->with('success', 'Category Successfully :)');

    }


    public function edit($id){
        $category = Category::findOrFail($id);
        return view('category.edit')->with('category',$category);

    }


    public function update(Request $request, $id){
        $category = Category::find($id);
        $category->brand_name = $request->input('brand_name');
        $category-> about_brand= $request->input('about_brand');
        $category-> status = $request->input('status');
        if($request->has('brand_logo')){
            $destination = 'uploads/Logo/'.$category->brand_logo;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('brand_logo');
            $extension  = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/Logo/',$filename);
            $category->brand_logo = $filename;
        }
        $category->update();

    return redirect('/category.index')->with('success', ' Category  Update Successfully :)');
    }

    public function delete(Request $request)
{
        $id= $request->id;
        $category = Category::findOrFail($id);
        $destination = 'uploads/logo/'.$category->brand_logo;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $category ->delete();
        return redirect('/category.index')->with('success', 'Category Deleted Successfully :)');

    }
}
