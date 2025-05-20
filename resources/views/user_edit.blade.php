<!DOCTYPE html>
<html lang="en">
<style>
    .is_error {color: red;}
</style>
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
    <div class="is_error">{{$message}}</div>
    @enderror
    <br>
    <label>Изменить пароль</label>
    <br>
    <input type="text" name="password" value=""/>
    @error('password')
    <div class="is_error">{{$message}}</div>
    @enderror
    <br>
    <input type="submit"/>
</form>
</body>
</html>
