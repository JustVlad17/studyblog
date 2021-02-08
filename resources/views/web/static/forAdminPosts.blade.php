@extends('web.master-layout')
@section('title', 'Работа с постами')
@section('content')
    @if (Session::has('role') && Session::get('role') === 'admin')
        <p class="foradmin"><a href="/foradmin/posts/createpost"><button>Создать пост</button></a></p>
        <p class="foradmin"><a href="/foradmin/posts/editpost"><button>Редактировать пост</button></a></p>
    @else
        <p>У вас недостаточно прав!</p>
    @endif
@endsection
