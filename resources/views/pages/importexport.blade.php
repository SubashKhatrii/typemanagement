@extends('layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="full-right">
				<h1>Type Management</h1>
			</div>
			
		</div>					

	</div>
	<div class="panel-body">
 
            <a href= "{{url('/pages/downloadExcel/xls') }}"> <button class="btn btn-success">Download Excel xls</button></a>
            <a href="{{url('/pages/downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
            <a href="{{url('/pages/downloadExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a>
 
            <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ route('pages-import') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                @csrf
 
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
 
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
 
                <input type="file" name="import_file" />
                <button class="btn btn-primary">Import File</button>
            </form>
 
          </div>
	

@endsection