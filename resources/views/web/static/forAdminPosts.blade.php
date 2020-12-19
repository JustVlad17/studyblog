@extends('web.master-layout')
@section('title', 'Работа с постами')
@section('content')
    @if (Session::has('role') && Session::get('role') === 'admin')
        <p><a href="/foradmin/posts/createpost">Создать пост</a></p>
        <p><a href="/foradmin/posts/editpost">Редактировать пост</a></p>
    @else
        <p>У вас недостаточно прав!</p>
    @endif
@endsection
