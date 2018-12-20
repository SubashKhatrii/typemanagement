<?php
namespace App\Http\Controllers\Admin;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Types;
use App\Traits\Utility;

class TypesController extends Controller
{

     use Utility;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    public function index()
    {
        //
        $model = new Types;

       $types =$model->findTitle();

        return view('pages.index')->with(compact('types'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.create');
    }

 
    public function store(Request $request)
    {
        //
       
      $model= new Types;
      $input = Input::all();
      $method = $request->method();
      if($request->isMethod('post')){

            $validate = $model->validation($input);

            if($validate->fails()){

                return redirect()->back()->withErrors($validate)->withInput();


             }
            $input['slug']  = $this -> slugify($input['title']);
            //
            $addResponse    = $model -> addinput($input);
            //echo "<pre>";print_r($input);die;

            if(isset($addResponse)) {

                $success    = isset($addResponse['response']) ? $addResponse['response'] : null;
                $error      = isset($addResponse['error']) ? $addResponse['error'] : null;
                if($success) {
                    return redirect() -> back() -> with('success', 'Successfully Added!');
                } else {
                    return redirect() -> back() -> withErrors($error) -> withInput();
                }
            } else {
                return redirect() -> back() -> withErrors('Something went wrong. Please try again!') -> withInput();
            }
        }


        return view('pages.create');
    }

    //edit functionality
    public function edit(Request $request, $id){
        $model = new Types;
        $type= $model->findOrFail($id);
        $input = Input::all();
        $method= $request->method();
            if($request->isMethod('post')){
                $validate= $model->validation($input);
                if($validate->fails()){
                    return redirect()->back()->withErrors($validate)->withInput();
                }
                $updateResponse= $model->changeTitle($id, $input);

                if(isset($updateResponse)){
                  $success = isset($updateResponse['response']) ? $updateResponse['response'] : null;
                  $error = isset($updateResponse['error']) ? $updateResponse['error'] : null;
                  if($success) {
                    return redirect() -> back() -> with('success', 'Successfully Added!');
                } else {
                    return redirect() -> back() -> withErrors($error) -> withInput();
                }
            } else {
                return redirect() -> back() -> withErrors('Something went wrong. Please try again!') -> withInput();
            }
                

                
            }



        return view('pages.edit')->with(compact('type'));
    }

                   //disabling the status
               public function disable(Request $request, $id)
              {
                  $disabled = Types::find($id) -> update(['disabled' => 1]);
                  if($disabled) {
                      return redirect() -> back() -> with('success', " Disabled");
                  } else {
                      return redirect() -> back() -> withErrors("Error Disabling the Title!");
                  }
              }
                //enabling the status
            
              public function enable(Request $request, $id)
              {
                  $disabled = Types::find($id) -> update(['disabled' => null]);
                  if($disabled) {
                      return redirect() -> back() -> with('success', "Enabled");
                  } else {
                      return redirect() -> back() -> withErrors("Error Enabling the Title!");
                  }
              }

    
}
