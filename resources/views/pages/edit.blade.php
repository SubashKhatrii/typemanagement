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
 <form action="{{ route('pages-edit', ['id' => $type -> id]) }}" method="POST" name="camper-type-form">
                        {{ csrf_field() }}
                        <div class="row">
                            @if($errors -> has('title'))
                                <div class="form-group has-error">
                                    <label for="title" class="control-label">Title</label>
                                    <input type="text" name="title" placeholder="Title" class="form-control" value="{{ old('title') ? old('title') : $type -> title }}" />
                                </div>
                            @else
                                 <div class="form-group has-error">
                                    <label for="title" class="control-label">Title</label>
                                    <input type="text" name="title" placeholder="Title" class="form-control" value="{{ old('title') ? old('title') : $type -> title }}" />
                                </div>
                            @endif
                        </div>
                        
                        <div class="row">
                            <div class="form-group">
                                <input type="submit" value="Update" class="btn btn-primary" />
                                <a class="btn btn-danger" href="{{ route('pages-index') }}">Cancel</a>
                            </div>
                        </div>
                    </form>
  </div>
</div>
	

@endsection