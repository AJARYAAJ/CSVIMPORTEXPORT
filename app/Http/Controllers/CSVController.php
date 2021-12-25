<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeExport;
use Illuminate\Http\Request;
use App\Imports\EmployeeImport;
use App\Models\CSVImport;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables as DataTablesDataTables;
date_default_timezone_set('Asia/Kolkata');

class CSVController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = CSVImport::latest()->get();
            return DataTablesDataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
       return view('csv_dataFile');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new EmployeeExport, 'employee.xlsx');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request) 
    {
        $request->validate([
            'title' => 'required',
            'quote_no' => 'required|unique:csvimports',
            'import_file' => 'required',
        ]);
        
        $title = $request->title;
        $quote_no = $request->quote_no;
        
        Excel::import(new EmployeeImport,request()->file('import_file'));
        Excel::import(new EmployeeImport,request()->title);
        Excel::import(new EmployeeImport,request()->quote_no);
             
        return back();
    }

    public function destroy($id)
    {
        CSVImport::find($id)->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
