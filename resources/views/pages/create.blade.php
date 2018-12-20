


@extends('layouts.app')
@section('content')
      <style>
        .uper {
          margin-top: 40px;
        }
      </style>
      <div class="card uper">
        <div class="card-header">
          Add 
        </div>
            <div class="card-body">
                        @if ($errors->any())
                          <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                          </div><br />
                        @endif

                  <form action="{{ route('pages-store') }}" method="POST" name="camper-type-form">

                                @csrf

                                <div class="row">
                                    @if($errors -> has('title'))
                                        <div class="form-group has-error">
                                            <label for="title" class="control-label"> Type Name</label>
                                            <input type="text" name="title" placeholder="Type Name" class="form-control" />
                                        </div>
                                    @else
                                        <div class="form-group">
                                           <label for="title" class="control-label"> Type Name</label>
                                            <input type="text" name="title" placeholder="Type Name" class="form-control" />
                                        </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                  <input type="submit" value="Add" class="btn btn-primary" />
                                
                                  
                                 </div>
                               </div>
                             </form>
                             <a href="{{route('pages-index')}}" class="btn btn-success btn-sm ">View All</a>
                           </div>
                         </div>

                            

                            @endsection