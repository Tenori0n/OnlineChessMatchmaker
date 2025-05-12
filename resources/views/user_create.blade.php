<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-22</title>
</head>
<body>
<h2>Регистрация</h2>
<form method="post" action={{url('user')}}>
    @csrf
    <label>Имя пользователя</label>
    <br>
    <input type="text" name="name" value="{{old('name')}}"/>
    @error('name')
    <div>{{$message}}</div>
    @enderror
<br>
    <label>Пароль</label>
    <br>
    <input type="password" name="password" value="{{old('password')}}"/>
    @error('password')
    <div>{{$message}}</div>
    @enderror
<br>
    <label>Подтверждение пароля</label>
    <br>
    <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}"/>
    @error('password_confirmation')
    <div>{{$message}}</div>
    @enderror
<br>
    <label>Электронная почта</label>
    <br>
    <input type="text" name="email" value="{{old('email')}}"/>
    @error('email')
    <div>{{$message}}</div>
    @enderror
<br>
    <label>Согласие с правилами сервиса</label>
    <br>
    <input type="checkbox" name="rules" value="1"/>
    @error('rules')
    <div>{{$message}}</div>
    @enderror
<br>
    <input type="submit"/>
</form>
</body>
