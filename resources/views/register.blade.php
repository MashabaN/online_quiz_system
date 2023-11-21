<<<<<<< HEAD
@extends('layout/layout-common')
@section('spacework')

    
@endsection



<form action="{{route('studentRegister')}}"method= "POST">

@csrf
<input type="text" name="name" placeholder="Enter name">
<br><br>
<input type="email" name="email" placeholder="Enter email">
<br><br>
<input type="password" name="password" placeholder="Enter password">
<br><br>
<input type="password" name="password_confirmation" placeholder="Enter confirm password">
<br><br>
<input type="submit" value="Register">




</form>
=======

@extends('layout/layout-common')

@section('space-work')

    <h1>Register</h1>

    @if($errors->any())
        @foreach($errors->all() as $error)
        <p style="color:red;">{{ $error }}</p>
        @endforeach
    @endif

    <form action="{{ route('studentRegister') }}" method="POST">
        @csrf

        <input type="text" name="name" placeholder="Enter Name">
        <br><br>
        <input type="email" name="email" placeholder="Enter Email">
        <br><br>
        <input type="password" name="password" placeholder="Enter Password">
        <br><br>
        <input type="password" name="confirm_password" placeholder="Confirm Password">
        <br><br>
        <input type="submit" value="Register">
                                       

    </form>

    @if(Session::has('success'))
        <p style="color:green;">{{ Session::get('success') }}</p>
    @endif

@endsection
>>>>>>> edbca632033e9d7d91ba74c973672b216714ae15
