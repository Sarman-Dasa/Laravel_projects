<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Queue Mail</title>
</head>
<body>
    <table border="1">
        <tr>
            <th colspan="3">Your Data</th>
        </tr>
        <tr>
            <td>Name :: {{$user->student_name}}</td>
            <td>Mobile number :: {{$user->student_mobile_number}}</td>
            <td>City :: {{$user->city}}</td>
        </tr>
    </table>
</body>
</html>