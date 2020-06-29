<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Upload & Analisa Korpus</title>
</head>
<body>
<form action="{{ url('/upload') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<input type="file" name="literatur" id="">
<input type="submit" value="Upload">
</form>
</body>
</html>
