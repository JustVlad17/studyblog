@extends('web.master-layout')
@section('title', 'Написать пост')
@section('content')
    @if (Session::has('role') && Session::get('role') === 'admin')
        <form action="" method="POST" class="postcreate">
            {{ csrf_field() }}
            <input style="width: 93%;" type="text" name="title" placeholder="Введите заголовок"><br>
            <textarea name="content" placeholder="Введите содержимое"></textarea><br>
            Выберите категорию<br>
            <select name="category">
                @foreach(\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                @endforeach
            </select><br>
            <input type="submit" value="Создать">
        </form>
        @if(isset($result))
            <p>{{ $result }}</p>
        @endif
    @else
        <p>У вас недостаточно прав!</p>
    @endif
@endsection
