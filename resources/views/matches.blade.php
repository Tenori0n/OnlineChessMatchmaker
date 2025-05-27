<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-22</title>
</head>
<body>
@extends('layout')
@section('content')
    <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4 text-light">Список партий:</p>
    <div class="w-100 d-flex flex-column align-items-center">
<table class="table table-dark w-75">
    <thead class="text-center">
        <td class="h-auto">id</td>
        <td>Название матча</td>
        <td>Имя победителя</td>
    </thead>
    @foreach($matches as $match)
        <tr class="text-center">
            <td>{{$match->id}} @if(Auth::user() and Auth::user()->is_admin) <a class="link-danger" style="text-decoration: none;" href="/match/destroy/{{$match->id}}" @endif>(Удалить)</a></td>
            <td><a class="link-light" style="text-decoration: none; font-weight: bold;" href="/match/{{$match->id}}">{{$match->whiteUser->name}} против {{$match->blackUser->name}}</a></td>
            @if($match->winnerColor)
                <td><a class="link-light" style="text-decoration: none; font-weight: bold;" href="/user/{{$match->blackUser->id}}">{{$match->blackUser->name}}</a></td>
            @else
                <td><a class="link-light" style="text-decoration: none; font-weight: bold;" href="/user/{{$match->whiteUser->id}}">{{$match->whiteUser->name}}</a></td>
            @endif
        </tr>
    @endforeach
</table>
{{$matches->links()}}
    </div>
@endsection
</body>
</html>
