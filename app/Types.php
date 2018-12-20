<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

use Validator;

class Types extends Model
{
    //
    protected $fillable= ['title','slug', 'disabled', 'created_at','updated_at'];

    //defining the rules 
     protected $rules = [
        'title'         => 'required|max:100'
    ];
    //validation function

    public function validation($data){

        $validate= Validator::make($data, $this->rules);

        return $validate;
    }

    //function for storing the data

    public function addinput($input){

            $response = false;
            $error = null;
        try {
            DB::transaction(function () use($input, &$response) {
                if(self::create($input)) {
                   // echo "<pre<";print_r($input);die;
                    $response = true;
                }
            });
        } catch(QueryException $e) {
            $error = $e -> getMessage();
        }

        return ['response' => $response, 'error' => $error];
    }
    //Edit

    public function changeTitle($id, $input){
        $response = false;
        $error = null;
      try {
            DB::transaction(function () use($id, $input, &$response) {
                $response = self::find($id) -> update($input);
            });
        } catch(QueryException $e) {
            $error = $e -> getMessage();
        }
        return ['response'=> $response, 'error' => $error];
    }


    public function findTitle()
    {
        return self::orderBy('disabled', 'asc') 
                    -> orderBy('created_at', 'desc') 
                    -> get();
    }

    


    


   

    protected $dates=[];

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
