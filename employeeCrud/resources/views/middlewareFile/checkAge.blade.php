<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Age</title>
</head>
<body>
    <form action="{{ route('checkAge')}}" method="POST">
        @csrf
        <table>
            <tr>
                <th>
                    User Age
                </th>
            </tr>
            <tr>
                <td>Enter Your Age</td>
                <td><input type="text" name="age"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Check">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>