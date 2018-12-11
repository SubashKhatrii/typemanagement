@extends('layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="full-right">
				<h1>Type Management</h1>
			</div>
			
		</div>					

	</div>
	<table class="table table-bordered">
		<tr>
			<th with="80px">No</th>
			<th>Title</th>
			<th width="140px" class="text-center">
				<a href="{{route('pages.create')}}" class="btn btn-success btn-sm">
					+
				</a>
			</th>
			<th>Action</th>

		</tr>
		<?php $no=1;?>
		@foreach($types as $key=>$value)
		<tr>
		<td>{{$no++}}</td>
		
		 <td>@if($value->status==NULL) {{$value->title}} @else DELETED @endif</td>

		<td>
		<a class="btn btn-primary btn-lg" href="{{route('pages.edit',$value->id)}}">Edit </i> </a>
		<td>
		
		{!!Form::open(['method'=>'DELETE','route'=>['pages.destroy', $value->id]])!!}
			<button type="submit" style="display: inline;" class="btn btn-danger btn-sm">Delete</button>

			
		{!! Form::close() !!}

		<a id="#delPermanently" href="{{ url('/pages/delete-permanently/'.$value->id) }}" class="btn btn-default btn-sm" title="Delete Permanently">RECYCLE</a>
		</td>

		
		
		
	
		</td>
		</tr>
		@endforeach
		
	</table>
	

@endsection