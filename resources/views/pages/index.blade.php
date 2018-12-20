@extends('layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="full-right">
				<h1>Type Management</h1>
			</div>
			
		</div>					

	</div>
	<a href="{{url('/import')}}" class="btn btn-success">Import</a>
	<a href="{{url('/download')}}" class="btn btn-success">Export All</a>
    <a href="{{route('pages-store')}}" class="btn btn-primary">Create</a>
    
	
	<table class="table table-bordered">
		<tr>
                            <th>S.no.</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(!$types -> isEmpty())
                                @foreach($types as $key => $type)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $type -> title }}</td>
                                        <td>
                                            @if($type -> disabled)
                                                Disabled
                                            @else
                                                Active
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('pages-edit', ['id' => $type -> id])}}" title="Edit Title">
                                                Edit
                                            </a>
                                            @if($type -> disabled)
                                                <a href="{{ route('pages-enable', ['id' => $type -> id])}}" title="Enable Title">
                                                    Enable
                                                </a>
                                            @else
                                                <a href="{{ route('pages-disable', ['id' => $type -> id])}}" title="Disable Title">
                                                    Disable
                                                </a>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">No Records Found</td>
                                </tr>
                            @endif
	</table>
	

@endsection