@extends('layouts.app')

@section('content')
<h1>Edit Student</h1>
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>

        @endforeach
    </ul>
</div>
@endif
@if(session('success'))
<div class="alert alert-success">
    <ul>
        {{session('success')}}
    </ul>
</div>
@endif

{!! Form::model($student, ['route' => ['students.update', $student->id], 'method' => 'put']) !!}

<div class="form-group">
    {!! Form::label('idno', 'IDno Number') !!}
    {!! Form::text('IDno', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('age', 'Age') !!}
    {!! Form::number('age', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}
@endsection