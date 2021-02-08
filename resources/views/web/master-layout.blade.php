<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ URL::asset('style/style.css?v=' . time()) }}" type="text/css">
    </head>
    <body>
        <div id="wrapper">
            <header>
                <a href="/" class="logo">Blog</a>
                <nav>
                    <a href="/">Главная</a>
                    <a href="/about">О нас</a>
                    @if (Session::has('role') && Session::get('role') === 'admin')
                        <a href="/foradmin">Админка</a>
                    @endif
                </nav>
            </header>
            <main>
                @yield('content')
            </main>
            <aside>
                <div class="bg-top"></div>
                <div class="top-pic">Авторизация</div>
                <div class="sidebar-box">
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
                <div class="top-pic">
                    @if(Session::has('auth'))
                        <a href="/logout">Выйти</a>
                    @else
                        <a href="/registration">Зарегестрироваться</a>
                    @endif
                </div>
                <div class="top-pic">Категории</div>
                <div class="sidebar-box">
                    <ul>
                        @foreach(\App\Models\Category::all() as $category)
                        <li><a href="/category/{{ $category->id }}">{{ $category->category }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="top-pic">Общая информация</div>
                <div class="sidebar-box">
                    <p>Этот блог создан в учебных целях</p>
                </div>
                <div class="bg-btm"></div>
            </aside>
            <footer>
                <div class="bg-top"></div>
                <div class="footer-content"><p>© Учебный блог | Автор: JustVlad | Все права защищены=)<p></div>
            </footer>
        </div>
    </body>
</html>


