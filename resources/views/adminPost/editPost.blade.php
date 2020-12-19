@extends('web.master-layout')
@section('title', 'Редактировать пост')
@section('content')
    @if (Session::has('role') && Session::get('role') === 'admin')
        <form class="postcreate">
            Заголовок<br>
            <input name="title" value="{{ $post->title }}">
            Содержимое<br>
            <textarea name="content">{{ $post->content }}</textarea>
            <input type="submit" name="redact" value="Изменить">
        </form>
    @else
        <p>У вас недостаточно прав!</p>
    @endif
@endsection
