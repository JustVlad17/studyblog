@extends('web.master-layout')
@section('title','Админка')
@section('content')
    @if (Session::has('role') && Session::get('role') === 'admin')
        <p><a href="/foradmin/users">Работа с юзерами</a></p>
        <p><a href="/foradmin/posts">Работа с постами</a></p>
        <p><a href="/foradmin/categories">Работа с категориями</a></p>
    @else
        <p>У вас недостаточно прав!</p>
    @endif
@endsection
