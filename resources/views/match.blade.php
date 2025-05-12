<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-22</title>
</head>
<body>
@if ($match)
    <h2><a href="/user/{{$match->whiteUser->id}}">{{$match->whiteUser->name}}</a> против <a href="/user/{{$match->blackUser->id}}">{{$match->blackUser->name}}</a></h2>
<table border="1">
    <thead>
    <td>Номер хода</td>
    <td>Ход белых</td>
    <td>Ход черных</td>
    </thead>
    @for($i = 0;$i<count($match->turns) ;$i+=2)
        <tr>
            <td>{{round(($match->turns)[$i]->turnNumber/2)}}</td>
            <td>{{($match->turns)[$i]->figure}}{{($match->turns)[$i]->fieldFrom}}-{{($match->turns)[$i]->fieldTo}}</td>
            @if (isset(($match->turns)[$i+1]))
                <td>{{($match->turns)[$i+1]->figure}}{{($match->turns)[$i+1]->fieldFrom}}-{{($match->turns)[$i+1]->fieldTo}}</td>
            @endif
        </tr>
    @endfor
</table>
@else
    <p>К сожалению, такого матча не существует</p>
@endif
</body>
