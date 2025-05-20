<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-22</title>
    <style>
        .is_error {color:red;}
    </style>
</head>
<body>
@if ($user)
    <h2>Здравствуйте, {{$user->name}}</h2>
    <a href="{{url('logout')}}">Выход</a>
@else
    <h2>Вход</h2>
    <form method="post" action="{{url('auth')}}">
    @csrf
    <label>Электронная почта</label>
        <br>
    <input type="text" name="email" value="{{old('email')}}"/>
    @error('email')
    <div class="is_error">{{$message}}</div>
    @enderror
        <br>
    <label>Пароль</label>
        <br>
    <input type="password" name="password"/>
    @error('password')
    <div class="is_error">{{$message}}</div>
    @enderror
        <br>
    <input type="submit">
    </form>
    @error('error')
    <div class="is_error">{{$message}}</div>
    @enderror
@endif
</body>

