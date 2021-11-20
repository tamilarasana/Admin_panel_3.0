<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Jobs\StoreQueuedExport;
use App\Models\Brochure;
use App\Models\Bikemodel;
use DB;
use File;

class BrochureController extends Controller
{
    public  function index()
    {
        $brochures = Brochure::join('bikemodels','bikemodels.id','brochures.model_id')
        ->select('brochures.id','brochures.file','bikemodels.title')->get();
        return view('brochure.index',[ 'brochures' =>$brochures]);
    }

    public  function create()
    {
        $model = Bikemodel::all();
        return view('brochure.create', compact('model'));
    }
    public function store(Request $request){
        // $brochure = new Brochure;
        // $brochure->model_id = $request('model_id');
         if($request->hasFile('file')){
            $file = $request->file('file');
            $extension  = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/file/',$filename);
            $path = 'uploads/file/'.$filename;
        }
        DB::table('brochures')->Insert([
            'file' => $path,
            'model_id' => $request->model_id,
         ]);
         return redirect('/brochure.index')->with('success', 'Brochure Store Successfully :)');
    }

    public function edit($id){
        $brochure = Brochure::find($id);
        $model = Bikemodel::all();
        return view('brochure.edit',['model' => $model, 'brochure' =>$brochure]);

    }
    public function update(Request $request,$id){
        // $brochure = DB::table('brochures')->where('id',$id)->first();

        $brochure =  Brochure::find($id);
        $file = $brochure->file;
        $update_data['model_id']    = $request->model_id;
        if($request->hasFile('file')){
            if(File::exists($file)){
                File::delete($file);
            }
                $file = $request->file('file');
                $extension  = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('uploads/file/',$filename);
                $path = 'uploads/file/'.$filename;
                $update_data['file']  = $path;
            }
        DB::table('brochures')->where('id',$id)->update($update_data);

        return redirect('/brochure.index')->with('success', 'Brochure Updated Successfully :)');

    }

    public  function delete($id)
    {
        $brochure =  Brochure::find($id);
        $file = $brochure->file;
            if(File::exists($file)){
                File::delete($file);
            }
            $brochure ->delete();
            return redirect('/brochure.index')->with('success', 'Brochure Deleted Successfully :)');

    }
}
