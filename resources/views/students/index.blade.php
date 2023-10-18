@extends('base')

@section('content')
    <h1>Student List</h1>
    <a href="{{ route('students.create') }}" class="btn btn-success mb-3">Create Student</a>
    @if(count($students) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Year Level</th>
                    <th>Age</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->year_level }}</td>
                        <td>{{ $student->age }}</td>
                        <td>
                            <a href="{{ route('students.edit', $student) }}" class="btn btn-secondary">Edit</a>
                            <form method="POST" action="{{ route('students.destroy', $student) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No students found.</p>
    @endif
@endsection
