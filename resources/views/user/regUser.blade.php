@extends('web.master-layout')
@section('title', 'Регистрация')
@section('content')
    <div class="regform">
        <form action="" method="POST">
            {{ csrf_field() }}
            <p>Введите логин</p>
            <input name="login"><br>
            <p class="small">Логин должен содержать только латинские буквы и цифры. Логин должен быть
            длиной от 5 до 15 символов.</p>
            <p>Введите пароль</p>
            <input type="password" name="password"><br>
            <p class="small">Пароль должен содержать только латинские буквы и цифры. Пароль должен быть
            длиной от 8 до 20 символов.</p>
            <p><input type="submit" value="Отправить"></p>
        </form>
        {{isset ($false) ? $false : ' '}}
    </div>
@endsection
