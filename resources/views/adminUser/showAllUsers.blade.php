@extends('web.master-layout')
@section('title', 'Работа с юзерами')
@section('content')
    @if (Session::has('role') && Session::get('role') === 'admin')
        <ul style="text-align: center">
            @foreach($users as $user)
                <li>
                    <p>{{ $user->login }}</p>
                    ID юзера:{{ $user->id }}<br>
                    Роль юзера:{{ $user->getRole->role }}<br>
                    @if ($user->getRole->role != 'admin')
                        <a href="/foradmin/users/deleteuser/{{ $user->id }}">Удалить</a><br>
                        <a href="/foradmin/users/changerole/{{ $user->id }}">Сделать админом</a>
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        <p>У вас недостаточно прав!</p>
    @endif
@endsection

