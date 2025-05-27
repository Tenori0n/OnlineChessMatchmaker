<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-22</title>
</head>
<body>
@extends('layout')
@section('content')
    <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4 text-light">Список пользователей:</p>
    <div class="w-100 d-flex flex-column align-items-center">
        <table class="table table-dark w-75">
            <thead class="text-center">
            <td>Имя пользователя</td>
            <td>Количество сыгранных игр</td>
            <td>Количество выигранных игр</td>
            <td>ЭЛО</td>
            </thead>
            @foreach($users as $user)
                <tr class="text-center">
                    <td ><a class="link-light" style="text-decoration: none; font-weight: bold;" href="/user/{{$user->id}}">{{$user->name}}</a>
                        @if(Auth::user() and Auth::user()->is_admin and !$user->is_admin)
                            <a class="link-danger" style="text-decoration: none;" href="/user/destroy/{{$user->id}}">(Удалить)</a>
                        @endif</td>
                    <td>{{$user->gamesPlayed}}</td>
                    <td>{{$user->gamesWon}}</td>
                    <td>{{$user->elo}}</td>
                </tr>
            @endforeach
        </table>
        {{$users->links()}}
    </div>
@endsection
</body>
</html>
