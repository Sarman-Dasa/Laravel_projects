<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Data</title>
</head>
<body>
    <form action="" method="post">
        @csrf
        <table border="2" align="center">
            <tr>
                <th colspan="2">User Data</th>
            </tr>
            <tr>
                <td>User Name</td>
                <td>
                    <input type="text" name="username" id="userID">
                </td>
            </tr>
            <tr>
                <td>User Email</td>
                <td>
                    <input type="email" name="userEmail" id="userEmailID">
                </td>
            </tr>
            <tr>
                <td>Mobile No.</td>
                <td>
                    <input type="tel" name="mobileNo" id="mobileID" pattern="^[0-9]+">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="submit" name="submit">
                </td>   
            </tr>
        </table>
    </form>
</body>
</html>