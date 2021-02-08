@extends('web.master-layout')
@section('title', 'Написать пост')
@section('content')
    @if (Session::has('role') && Session::get('role') === 'admin')
        <form action="" method="POST" class="postcreate">
            {{ csrf_field() }}
            <input style="width: 97.5%; margin-bottom: 10px" type="text" name="title" placeholder="Введите заголовок"><br>
            <textarea name="content" placeholder="Введите содержимое" style="width: 99.5%; height: 200px; resize: none; margin-bottom: 5px">
            </textarea><br>
            Выберите категорию<br>
            <select style="width: 100%; margin-bottom: 10px" name="category">
                @foreach(\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                @endforeach
            </select><br>
            <input style="width: 100%" type="submit" value="Создать">
        </form>
        @if(isset($result))
            <p>{{ $result }}</p>
        @endif
    @else
        <p>У вас недостаточно прав!</p>
    @endif
@endsection
