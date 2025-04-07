<!-- resources/views/partials/header.blade.php -->

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Прокат туристического оборудования
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarContent" aria-controls="navbarContent"
                aria-expanded="false" aria-label="Переключить навигацию">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/orders') }}">Заказы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/stocks') }}">Склады</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/models') }}">Модели</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('items.index') }}">Товары</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employees.index') }}">Сотрудники</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('movements.index') }}">Перемещения</a>
                </li>

{{--                @guest--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{ route('login') }}">Войти</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{ route('register') }}">Регистрация</a>--}}
{{--                    </li>--}}
{{--                @else--}}
{{--                    <li class="nav-item dropdown">--}}
{{--                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"--}}
{{--                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            {{ Auth::user()->name }}--}}
{{--                        </a>--}}

{{--                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">--}}
{{--                            <a class="dropdown-item" href="{{ route('dashboard') }}">Панель</a>--}}

{{--                            <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">--}}
{{--                                Выйти--}}
{{--                            </a>--}}

{{--                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                @csrf--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                @endguest--}}
            </ul>
        </div>
    </div>
</nav>
