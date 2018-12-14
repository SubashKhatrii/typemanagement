<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Types;
use Input;
use DB;
use Excel;
 



class ExcelController extends Controller
{
    //
    public function getImport(){
    	return view('excel.importDetails');
    }
    public function postImport(){

    	
    	
    	Excel::import(Input::file('details'), function($reader){
    		$reader->each(function($sheet){
    			Types::firstOrCreate($sheet->toArray());

    		});
    	});
    }


    public function getExport(){
    	$type = Types::all();
    	Excel::create('Export Data', function($excel) use($type){
    		$excel->sheet('Sheet 1', function($sheet) use($type){
    			$sheet->formArray($type);

    		});

    	})->export('xlsx');
    }
}
