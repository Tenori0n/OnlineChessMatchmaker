<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-22</title>
</head>
<body>
@extends('layout')
@section('content')
@if ($user)
    <div class="d-flex flex-row">
        <div class="">
            @if (file_exists(public_path("avatars/$user->id/$user->name.jpg")))
                <img src="{{ asset("avatars/$user->id/$user->name.jpg") }}" height="200" width="200">
            @else
                <img src="{{ asset("avatars/default.png") }}" height="200" width="200">
            @endif
        </div>
        <div class="d-flex flex-column">
            <div class="d-flex flex-row">
                <h2>{{$user->name}}</h2>
                @if (Auth::user() and (Auth::id() == $user->id or Auth::user()->is_admin))
                    <p><a href="{{$user->id}}/edit">Изменить данные</a></p>
                @endif
                @if (Auth::user() and (Auth::user()->is_admin and !$user->is_admin))
                    <p><a href="destroy/{{$user->id}}">Удалить пользователя</a></p>
                @endif
                @if (Auth::user() and (Auth::id() == $user->id))
                    <a href="{{url('logout')}}">Выход</a>
                @endif
            </div>
            <p>Количество сыгранных игр: {{$user->gamesPlayed}}</p>
            <p>Количество выигранных игр: {{$user->gamesWon}}</p>
            <p>ЭЛО: {{$user->elo}}</p>
            <h2>Последние сыгранные матчи:</h2>
            <table border="1">
                <thead>
                <td>id</td>
                <td>Название матча</td>
                <td>Имя победителя</td>
                </thead>
                @foreach($matches as $match)
                    @if ($match->white_ID == $user->id || $match->black_ID == $user->id)
                        <tr>
                            <td>{{$match->id}}</td>
                            <td><a href="/match/{{$match->id}}">{{$match->whiteUser->name}} против {{$match->blackUser->name}}</a></td>
                            @if($match->winnerColor)
                                <td><a href="/user/{{$match->blackUser->id}}">{{$match->blackUser->name}}</a></td>
                            @else
                                <td><a href="/user/{{$match->whiteUser->id}}">{{$match->whiteUser->name}}</a></td>
                            @endif
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
    </div>
@else
    <p>К сожалению, такого пользователя не существует</p>
@endif
@endsection
</body>
