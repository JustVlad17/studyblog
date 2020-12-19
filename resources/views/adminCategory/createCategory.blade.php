@extends('web.master-layout')
@section('title', 'Создать пост')
@section('content')
    @if (Session::has('role') && Session::get('role') === 'admin')
        <p style="text-align: center;">{{ $result }}</p>
        <form>
            <input style="width: 94%; margin-bottom: 10px;" name="category" placeholder="Введите название категории"><br>
            <input style="width: 97%;" type="submit" value="Создать">
        </form>
    @else
        <p>У вас недостаточно прав!</p>
    @endif
@endsection
