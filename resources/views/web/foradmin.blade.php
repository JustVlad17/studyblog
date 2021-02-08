@extends('web.master-layout')
@section('title','Админка')
@section('content')
    @if (Session::has('role') && Session::get('role') === 'admin')
        <p class="foradmin"><a href="/foradmin/users"><button>Работа с юзерами</button></a></p>
        <p class="foradmin"><a href="/foradmin/posts"><button>Работа с постами</button></a></p>
        <p class="foradmin"><a href="/foradmin/categories"><button>Создать категорию</button></a></p>
    @else
        <p>У вас недостаточно прав!</p>
    @endif
@endsection
