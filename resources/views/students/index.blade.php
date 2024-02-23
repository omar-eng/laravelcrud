@extends('layouts.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    <ul>
        {{session('success')}}
    </ul>
</div>
@endif
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">IDno</th> <!-- Update this line -->
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <th scope="row">{{$student->id}}</th>
            <td>{{$student->name}}</td>
            <td>{{$student->age}}</td>
            <td>{{$student->IDno}}</td>
            <td>
                <a class="btn btn-primary" href="{{ url('students/edit', $student->id) }}">
                    Edit
                </a>

            </td>
            <td>
                <form action="{{ route('students.destroy', $student->id) }}" method="post"
                    onsubmit="return confirm('Are you sure you want to delete this student?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection