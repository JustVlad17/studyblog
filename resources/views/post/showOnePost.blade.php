@extends('web.master-layout')
@section('title')
    {{ $post->title }}
@endsection
@section('content')
    <div class="post">
        <h2>{{ $post->title }}</h2>
        <p class="date">Дата создания: {{ $post->created_at }}</p>
        <p>{{ $post->content }}</p>
        @if (Session::has('auth'))
            <p class="comment">Написать комментарий</p>
            <form action="" method="POST">
                {{ csrf_field() }}
                <textarea style="width: 99.7%; height: 100px; resize: none" name="comment"></textarea><br>
                <input type="submit" name="query" value="Отправить" style="width: 99.9%">
            </form>
        @endif
        <p class="comment">Комментарии</p>
        @if (isset($comments))
            @foreach ($comments as $comment)
            <div class="comment-content">
                Имя пользователя: {{ $comment->login->login }}<br>
                Дата: {{ $comment->created_at }}<br>
                @if (Session::get('role') === 'admin')
                    <a href="/post/{{ $post->id }}/deletecomment/{{ $comment->id }}">Удалить комментарий</a>
                @endif
                <p>{{ $comment->comment }}</p>
            </div>
            @endforeach
        @else
            <p>Здесь пока нету комментариев.</p>
        @endif
    </div>
@endsection
