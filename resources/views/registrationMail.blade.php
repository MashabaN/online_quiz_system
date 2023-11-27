<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $data['title'] }}</title>
</head>
<body>
    <table>
        <tr>
            <th>Name</th>
            <th>{{ $data['name'] }}</th>
</tr>
        <tr>
            <th>Email</th>
            <th>{{ $data['email'] }}</th>
</tr>
        <tr>
            <th>Password</th>
            <th>{{ $data['password'] }}</th>
        </tr>
</table>

    <a href="{{ $data['url'] }}">Click here to login your account.</a>
    <p>THANK YOU!</p>

       
</body>
</html>