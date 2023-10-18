@extends('base')

@section('content')
    <h1>Create Student</h1>
    <form method="POST" action="{{ route('students.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="year_level">Year Level:</label>
            <input type="text" name="year_level" id="year_level" class="form-control">
        </div>
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="text" name="age" id="age" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create Student</button>
    </form>
@endsection
