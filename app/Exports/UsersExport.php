<?php

namespace App\Exports;

use App\User;
use App\Types;
use DB;

use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	//testing phase return DB::table('users')->get();
        return DB::table('types')->get();
    }
}
