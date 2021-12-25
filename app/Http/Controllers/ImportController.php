<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\EmployeeExport;
use App\Helpers\Helper;
use App\Models\CSVImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;
date_default_timezone_set('Asia/Kolkata');

class ImportController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = CSVImport::latest()->get();
            return DataTables::of($data)
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
        $quote_nunmber = $request->quote_no;
        //$quote_no = Helper::IDGenerator(new CSVImport, 'quote_no', 5, $quote_nunmber);

        if ($request->input('submit') != null ){
            $file = $request->file('import_file');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();

            $valid_extension = array("csv");
            // File Size 2MB
            $maxFileSize = 2097152; 
      
            if(in_array(strtolower($extension),$valid_extension)){
                if($fileSize <= $maxFileSize){
                    $location = 'uploads';
                    $file->move($location,$filename);
                    $filepath = public_path($location."/".$filename);
        
                    $file = fopen($filepath,"r");
        
                    $importData_arr = array();
                    $i = 0;
      
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata );
                        
                        // Skip first row
                        if($i == 0){
                            $i++;
                            continue; 
                        }

                        for ($c=0; $c < $num; $c++) {
                            $importData_arr[$i][] = $filedata [$c];
                        }
                        $i++;
                    }
                    fclose($file);
                    
                    foreach($importData_arr as $importData){
                    $insertData = array(
                        'title' => $title,
                        'quote_no' => Helper::IDGenerator(new CSVImport, 'quote_no', 5, $quote_nunmber),
                        'employee_id' => $importData[0],
                        'employee_name' => $importData[1],
                        'relation' => $importData[2],
                        'doj' => $importData[3],
                        'dob' => $importData[4],
                        'gender' => $importData[5],
                        'age' => $importData[6],
                        'email_id' => $importData[7],
                        'mobile_no' => $importData[8]);

                        CSVImport::create($insertData);
                    }
                    Session::flash('message','Import Successful.');
                } else{
                    Session::flash('message','File too large. File must be less than 2MB.');
                }
            }else{
               Session::flash('message','Invalid File Extension.');
            }
        }
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