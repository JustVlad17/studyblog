@extends('web.master-layout')
@section('title', 'Все посты')
@section('content')
    @if (Session::has('role') && Session::get('role') === 'admin')
        @foreach($posts as $post)
            <div class="choise">
                <p>Название: {{ $post->title }}</p>
                <p>Дата создания: {{ $post->created_at }}</p>
                <form action="/foradmin/posts/editpost/delete/{{ $post->id }}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" value="Удалить">
                </form>
                <a href="/foradmin/posts/editpost/redact/{{ $post->id }}"><button>Редактировать</button></a>
            </div>
        @endforeach
    @else
        <p>У вас недостаточно прав</p>
    @endif
@endsection
