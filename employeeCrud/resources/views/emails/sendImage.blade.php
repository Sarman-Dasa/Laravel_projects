<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image Send</title>
</head>
<body>
    <h1>Image Data</h1>
    <p>Name : {{$userdata['name']}}</p>
    <p>City : {{$userdata['city']}}</p>
    <p>
           <img src="{{$message->embedData($userdata['image'], '1675662544.jpg') }}" alt="Image Not Found">
    </p>
</body>
</html> 