@extends('admin.layout.master')
@section('title')
    Manage Student
@endsection
@section('content')
	<div class="container">
		<h4 class="text-center">Student Information</h4>
        <div class="d-flex justify-content-end mb-2">
             <a href="{{ Route('student.trash')}}" class="btn btn-secondary">Trash</a>
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
                        <a href="{{ Route('student.edit',$student->id) }}" class="btn btn-primary">edit</a>
                        <a href="{{Route('student.delete', $student->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <!-- Button trigger modal -->


            @endforeach
            </tbody>
			
			
		</table>
       
	</div>

@endsection
