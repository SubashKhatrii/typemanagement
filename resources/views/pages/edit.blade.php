@extends('layouts.app')
@section('content')

	<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
  Edit Title
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

{!! Form::model($type,['route'=>[ 'pages.update',$type->id],'method'=>'PATCH']) !!}
          <div class="form-group">
              
              <label for="title">Title:</label>
              <input type="text" class="form-control" name="title" value="{{$type->title}}" />
          </div>
         
          <button type="submit" class="btn btn-primary">Edit</button>
      {!! Form::close() !!}
  </div>
</div>
	

@endsection