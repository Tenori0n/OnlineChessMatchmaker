<!DOCTYPE html>
<html lang="en">
<style>
    .is_error {color: red}
</style>
<head>
    <meta charset="UTF-8">
    <title>609-22</title>
</head>
<body>
@extends('layout')
@section('content')
<p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 text-light">Регистрация</p>
<form class="mx-1 mx-md-4 d-flex justify-content-center" method="post" action={{url('user')}}>
    @csrf
    <div class="w-50">
        <div data-mdb-input-init class="d-flex mb-4 form-outline flex-fill">
            <input class="form-control" type="text" name="name" placeholder="Имя пользователя"/>
        </div>
        <div data-mdb-input-init class="d-flex mb-4 form-outline flex-fill">
            <input class="form-control" type="password" name="password" placeholder="Пароль"/>
        </div>
        <div data-mdb-input-init class="d-flex mb-4 form-outline flex-fill">
            <input class="form-control" type="password" name="password_confirmation" placeholder="Подтверждение пароля"/>
        </div>
        <div data-mdb-input-init class="d-flex mb-4 form-outline flex-fill">
            <input class="form-control" type="text" name="email" placeholder="Электронная почта"/>
        </div>
        <div class="form-check d-flex justify-content-center mb-3">
            <input class="form-check-input me-2" type="checkbox" name="rules" value="1"/>
            <label class="form-check-label">Я согласен с правилами сервиса</label>
        </div>
        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-3">
            <input  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-lg " value="Регистрация"/>
        </div>
    </div>
</form>
@endsection
</body>
