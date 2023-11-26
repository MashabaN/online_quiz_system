@extends('layout/admin-layout')

@section('space-work')

     <h2 class="mb-4">Students</h2>

     <table class="table">
        <thread>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
</thread>
<tbody>
    @if(count($students) > 0)
       @foreach($students as $student)
       <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
</tr>
@endforeach
@else
<tr>
    <td colspan="3">Students not Found!</td>
</tr>
@endif
</tbody>
</table>

@endsection