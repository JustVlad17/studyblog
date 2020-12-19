<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ URL::asset('style/style.css?v=' . time()) }}" type="text/css">
</head>
<body>
<div class="body">
    <header>
        <div class="header"></div>
            <div class="headernav">
                <span><a href="/">Главная</a></span>
                <span><a href="/about">О нас</a></span>
                @if (Session::has('role') && Session::get('role') === 'admin')
                    <span><a href="/foradmin">Админка</a></span>
                @endif
            </div>
    </header>
    <main>
        <div class="content">
        @yield('content')
        </div>
    </main>
    <sidebar>
        <div class="sidebar">
            <div class="login">
                @if(Session::has('auth'))
                    <p>Вы зашли под логином: {{ Session::get('login') }}</p>
                @else
                    <form action="/authorization" method="POST">
                        {{ csrf_field() }}
                        <input type="text" name="login" placeholder="Введите логин"><br>
                        <input type="password" name="password" placeholder="Введите пароль"><br>
                        <input type="submit" value="Войти">
                    </form>
                @endif
            </div>
            @if(Session::has('auth'))
                <div class="registration">
                    <a href="/logout"><button>Выйти</button></a>
                </div>
            @else
                <div class="registration">
                    <a href="/registration">Зарегестрироваться</a>
                </div>
            @endif
            <div class="categories">
                <p>Категории</p>
                <ul>
                    @foreach(\App\Models\Category::all() as $category)
                        <li><a href="/category/{{ $category->id }}">{{ $category->category }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="random">
                <p> Здесь я ничего не придумал. Придётся вам с этим смириться. Возможно, тут что-то будет, но не обещаю. Такова жизнь=)</p>
            </div>
        </div>
    </sidebar>
<!--<footer>
    <div class="footernav">
        <span><a href="/">Главная</a></span>
        <span><a href="/about">Обо мне</a></span>
    </div>
</footer>-->
</div>
</body>
</html>
