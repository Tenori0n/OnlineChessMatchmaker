<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-22</title>
</head>
<body>
<h2>Изменение данных пользователя</h2>
<form method="post" action={{url('user/update/'.$user->id)}}>
    @csrf
    <label>Изменить имя пользователя</label>
    <br>
    <input type="text" name="name" value="@if (old('name')) {{old('name')}} @else {{$user->name}} @endif"/>
    @error('name')
    <div>{{$message}}</div>
    @enderror
    <br>
    <label>Изменить пароль</label>
    <br>
    <input type="text" name="password" value=""/>
    @error('password')
    <div>{{$message}}</div>
    @enderror
    <br>
    <label>Аватар</label>
    <input type="submit"/>
</form>
</body>
</html>
