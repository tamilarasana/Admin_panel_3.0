<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

class EnquiryController extends Controller
{
    public function index(){
        $forms=   Form::orderBy('id', 'DESC')->simplepaginate(15);
        // $forms = DB::table('forms')->orderBy('id', 'desc')->limit(5)->get()->paginate(15);
        return view('enquiry.index', ['forms' => $forms]);
    }

    // public function export()
    // {
    //     return Excel::download(new UsersExport, 'enquiry.xls');
    // }

      public function export(Request $request)
    {
       $fromDate = $request->input('from');
       $toDate = $request->input('to');
    //    $query = DB::table('forms')->select("*")->whereBetween('created_at', [$fromDate, $toDate])->get();

    //   $query = DB::table('forms')->where('created_at', '>=',$fromDate)->where('created_at','<=', $toDate)->get();

    //    dd($query);
        return Excel::download(new UsersExport($fromDate,$toDate), 'enquiry.xls');
    }
}
