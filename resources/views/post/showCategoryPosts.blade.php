@extends('web.master-layout')
@section('title')
    {{ $category->category }}
@endsection
@section('content')
    @if (!empty($posts))
        @foreach ($posts as $post)
            <div class="post">
                <a href="/post/{{ $post->id }}">{{ $post->title }}</a><br>
                Дата создания: {{ $post->created_at }}<br>
                <p>{{ substr($post->content, 0, 250).'...' }}</p>
            </div>
        @endforeach
    @else
        <p>В данной категории пока нету постов</p>
    @endif
@endsection

