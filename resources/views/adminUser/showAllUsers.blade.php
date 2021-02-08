@extends('web.master-layout')
@section('title', 'Работа с юзерами')
@section('content')
    @if (Session::has('role') && Session::get('role') === 'admin')
        @foreach($users as $user)
            <div style="border-bottom: 1px solid black; padding-bottom: 10px">
                <p class="foradmin">{{ $user->login }}</p>
                ID юзера:{{ $user->id }}<br>
                Роль юзера:{{ $user->   getRole->role }}<br>
                @if ($user->getRole->role != 'admin')
                    <p class="foradmin"><a href="/foradmin/users/deleteuser/{{ $user->id }}"><button>Удалить</button></a></p>
                    <p class="foradmin"><a href="/foradmin/users/changerole/{{ $user->id }}"><button>Сделать админом</button></a></p>
                @endif
            </div>
        @endforeach
    @else
        <p>У вас недостаточно прав!</p>
    @endif
@endsection

