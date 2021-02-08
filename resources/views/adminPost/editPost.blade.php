@extends('web.master-layout')
@section('title', 'Редактировать пост')
@section('content')
    @if (Session::has('role') && Session::get('role') === 'admin')
        <form class="postcreate">
            Заголовок<br>
            <input name="title" value="{{ $post->title }}" style="width: 97.5%"><br>
            Содержимое<br>
            <textarea name="content" style="width: 99.5%; height: 200px; resize: none">
                {{ $post->content }}
            </textarea>
            <input type="submit" name="redact" value="Изменить" style="width: 100%">
        </form>
    @else
        <p>У вас недостаточно прав!</p>
    @endif
@endsection
