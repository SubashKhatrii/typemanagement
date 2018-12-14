<?php

namespace App\Http\Controllers;
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    //

    public function export() 
    {
    	//testing phase return Excel::download(new UsersExport, 'users.xlsx');
    	// to store inside storage folder Excel::store(new UsersExport, 'types.xlsx'); return back();

        return Excel::download(new UsersExport, 'types.xlsx');
       
    }
     public function import() 
    {
        Excel::import(new UsersImport, 'types.xlsx');
        
        return redirect('/pages')->with('success', 'All good!');
    }
}
