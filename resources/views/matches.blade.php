<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-22</title>
</head>
<body>
<h2>Список партий:</h2>
<table border="1">
    <thead>
        <td>id</td>
        <td>Название матча</td>
        <td>Имя победителя</td>
    </thead>
    @foreach($matches as $match)
        <tr>
            <td>{{$match->id}}</td>
            <td><a href="/match/{{$match->id}}">{{$match->whiteUser->name}} против {{$match->blackUser->name}}</a></td>
            @if($match->winnerColor)
                <td><a href="/user/{{$match->blackUser->id}}">{{$match->blackUser->name}}</a></td>
            @else
                <td><a href="/user/{{$match->whiteUser->id}}">{{$match->whiteUser->name}}</a></td>
            @endif
        </tr>
    @endforeach
</table>
{{$matches->links()}}
</body>
</html>
