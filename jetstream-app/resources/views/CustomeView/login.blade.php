<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <table>
            <tr>
                <td>Login</td>
                <td>User</td>
                <td><input type="text" name="" id=""></td>
                <td>Pasword</td>
                <td><input type="password" name="" id=""></td>
                <td><input type="submit" value="submit"></td>
            </tr>
        </table>
</form>
</body>
</html>