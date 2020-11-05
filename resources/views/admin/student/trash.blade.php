@extends('admin.layout.master')
@section('title')
   Trash Data
@endsection
@section('content')
	<div class="container">
		<h4 class="text-center">Trash Student Information</h4>
        <div class="d-flex justify-content-end mb-2">
             <a href="{{ Route('student.index')}}" class="btn btn-secondary">Back</a>
        </div>
       
        @if(session()->has('message'))
            <h2 class="alert alert-danger">{{ session()->get('message') }}</h2>
        @endif
        @if(session()->has('success'))
            <h2 class="alert alert-success">{{ session()->get('success') }}</h2>
        @endif
		<table class="table" id ="data_table" data-page-length='5'>
            <thead>
                <tr>
                <th>Sl</th>
                <th>Name</th>
                <th>Roll</th>
                <th>Image</th>
                <th>Phone No.</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            </thead>
			<tbody>
                @php
                $i=1;
            @endphp
            @foreach($students as $student)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->roll }}</td>
                <td>
                    <img src="{{ Storage::url($student->image) }}" alt="" width="100">
                </td>
                <td>
                    {{ $student->phone_no }}
                </td>
                <td>
                    {{ $student->address }}}
                </td>
                <td>
                    <a href="{{ Route('student.restore',$student->id) }}" class="btn btn-primary">Restore</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$student->id}}">
                       Delete
                    </button>
                </td>
            </tr>
                <!-- Button trigger modal -->


                <!-- Modal -->
                <div class="modal fade" id="delete{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are You sure?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Delete Permanently !
                            </div>
                            <div class="modal-footer">
                                <a href="{{Route('student.permanentDelete', $student->id)}}" class="btn btn-danger">Delete</a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </tbody>
			
		</table>
	</div>

@endsection
