<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-22</title>
</head>
<body>
<h2>Список пользователей:</h2>
<table border="1">
    <thead>
        <td>Никнеим</td>
        <td>Количество сыгранных игр</td>
        <td>Выигранных игр</td>
        <td>ЭЛО</td>
    </thead>
@foreach($users as $user)
    <tr>
        <td><a href="/user/{{$user->id}}">{{$user->name}}</a></td>
        <td>{{$user->gamesPlayed}}</td>
        <td>{{$user->gamesWon}}</td>
        <td>{{$user->elo}}</td>
    </tr>
    @endforeach
</table>
{{$users->links()}}
</body>
</html>
