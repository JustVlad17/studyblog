@extends('web.master-layout')
@section('title', 'Все посты')
@section('content')
    @if (Session::has('role') && Session::get('role') === 'admin')
        @foreach($posts as $post)
            <div>
                <p>Название: {{ $post->title }}</p>
                Дата создания: {{ $post->created_at }}<br>
                {{--<a href="/foradmin/posts/editpost/delete/{{ $post->id }}">Удалить пост</a><br>--}}
                <form action="/foradmin/posts/editpost/delete/{{ $post->id }}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" value="Удалить">
                </form>
                <a href="/foradmin/posts/editpost/redact/{{ $post->id }}">Редактировать</a>
            </div>
        @endforeach
    @else
        <p>У вас недостаточно прав</p>
    @endif
@endsection
