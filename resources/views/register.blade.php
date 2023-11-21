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