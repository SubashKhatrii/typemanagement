<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Types extends Model
{
    //
    protected $fillable= ['title'];

   

    protected $dates=['created_at','updated_at'];

    public function addTitle($request){

    	
    	 Types::create($request->all());

    }
    public function editTitle($request,$id){
    	 Types::find($id)->update($request->all());

    }

    public function deleteID($request,$id=null){



    	

    		$types = Types::where(['id'=>$id])->first();
    		
    		$types = DB::table('types')->where(['id'=>$id])->update([
    											'status'=> 1
    										]);

    	


    	
    	
    	
    	

    }
}
