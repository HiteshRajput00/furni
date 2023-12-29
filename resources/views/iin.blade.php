<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<form action="/changecontent" method="POST">
    @csrf
<input value=" {{ trans('welcome') }}" name="welcome">
<p>{{ trans('about') }}</p>
<button type="submit">save</button>
</form>

</body>
</html>
