<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Types;


class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $types= Types::all();

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       $this->validate($request, ['title'=>'required',]);
       $data= new Types;
       $data->addTitle($request);
      
       return redirect()->route('pages.index')->with('success','Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $type = Types::find($id);
        return view('pages.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

     
        
      $this->validate($request, ['title'=>'required']);
      $data= new Types;
       $data->editTitle($request,$id);
        

       
        return redirect()->route('pages.index')->with('success','Updated Successfully');

        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id=null)
            {
                //
             /*   if($request->isMethod('delete')){
                    $data= $request->all();
                    echo "<pre>";print_r($data);die;

                }
        */
                //Types::find($id)->delete()
                
                $type= new Types();

                $type->deleteID($request,$id);

                

                return redirect()->route('pages.index')->with('success','deleted Successfully');
            }

            
    public function deletePermanently(Request $request,$id=null){
                Types::find($id)->delete();
                return redirect()->route('pages.index')->with('success','deleted Successfully');

            }
}
