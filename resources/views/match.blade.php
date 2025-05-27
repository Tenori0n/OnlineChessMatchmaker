<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-22</title>
</head>
<body>
@extends('layout')
@section('content')
@if ($match)
    <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4 text-light"><a class="link-warning" style="text-decoration: none; font-weight: bold;" href="/user/{{$match->whiteUser->id}}">{{$match->whiteUser->name}}</a> против <a class="link-warning" style="text-decoration: none; font-weight: bold;" href="/user/{{$match->blackUser->id}}">{{$match->blackUser->name}}</a></p>
    <div class="w-100 d-flex flex-column align-items-center">
    <table class="table table-dark w-auto">
    <thead class="text-center">
    <th>Номер хода</th>
    <th>Ход белых</th>
    <th>Ход черных</th>
    </thead>
    @for($i = 0;$i<count($match->turns) ;$i+=2)
        <tr class="text-center">
            <td>{{round(($match->turns)[$i]->turnNumber/2)}}</td>
            <td>{{($match->turns)[$i]->figure}}{{($match->turns)[$i]->fieldFrom}}-{{($match->turns)[$i]->fieldTo}}</td>
            @if (isset(($match->turns)[$i+1]))
                <td>{{($match->turns)[$i+1]->figure}}{{($match->turns)[$i+1]->fieldFrom}}-{{($match->turns)[$i+1]->fieldTo}}</td>
            @endif
        </tr>
    @endfor
</table>
    </div>>
@else
    <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4 text-light">К сожалению, такого матча не существует</p>
@endif
@endsection
</body>
