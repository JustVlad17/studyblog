@extends('web.master-layout')
@section('title', 'Главная')
@section('content')
    @if (isset($posts))
        @foreach ($posts as $post)
            <div class="post">
                <a href="/post/{{ $post->id }}"><p>{{ $post->title }}</p></a>
                Дата создания: {{ $post->created_at }}<br>
                @if (strlen($post->content) > 250)
                    <p>{{ substr($post->content, 0 ,255) . '...' }}</p>
                @else
                    <p>{{ $post->content }}</p>
                @endif
            </div>
        @endforeach
    @else
        <p>Здесь пока нету постов</p>
    @endif
@endsection('content')

{{--*/--}}
