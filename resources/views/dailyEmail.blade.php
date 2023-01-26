<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" value="{{ csrf_token() }}" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Test task</title>
</head>

<body>
    <h2>Hey, Good Morning {{ $details['user']->name }}</h2>
    <br>
    <p>On behalf of the entire company I wish you a very happy birthday and send you my best wishes for much happiness
        in your life.</p>

    Thank you
</body>

</html>
