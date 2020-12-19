@extends('web.master-layout')
@section('title')
    {{ $post->title }}
@endsection
@section('content')
    <div class="post">
        <p class="title">{{ $post->title }}</p>
        <p class="date">Дата создания: {{ $post->created_at }}</p>
        <p>{{ $post->content }}</p>
        @if (Session::has('auth'))
            <p class="title">Написать комментарий</p>
            <form action="" method="POST">
                {{ csrf_field() }}
                <textarea style="width: 99%; height: 100px" name="comment"></textarea><br>
                <input type="submit" name="query" value="Отправить">
            </form>
        @endif
        <p class="title">Комментарии</p>
        @if (isset($comments))
            @foreach ($comments as $comment)
            <div class="comment">
                Имя пользователя: {{ $comment->login->login }}<br>
                Дата: {{ $comment->created_at }}<br>
                <p>{{ $comment->comment }}</p>
                @if (Session::get('role') == 'admin')
                    <a href="/post/{{ $post->id }}/deletecomment/{{ $comment->id }}">Удалить комментарий</a>
                @endif
            </div>
            @endforeach
        @else
            <p>Здесь пока нету комментариев.</p>
        @endif
    </div>
@endsection
