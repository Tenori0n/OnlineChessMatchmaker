<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-warning" href="{{url('match')}}">OnlineChessMatchmaker</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarColapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0  ">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('match')}}">Матчи</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('users')}}">Пользователи</a>
                    </li>
                </ul>
                @if(!Auth::user())
                    <li class="navbar-nav me-2 mb-2 mb-md-0">
                        <a class="nav-link" href="user/create">Регистрация</a>
                    </li>
                    <form class="d-flex" method="post" action="{{url('auth')}}">
                        @csrf
                        <input class="form-control me-2" type="text" placeholder="Логин" name="email" aria-label="Логин" value="{{old('email')}}"/>
                        <input class="form-control me-2" type="password" placeholder="Пароль" name="password" aria-label="Пароль" value="{{old('password')}}"/>
                        <button class="btn btn-warning">Войти</button>
                    </form>
                @else
                    <ul class="navbar-nav">
                        <a class="nav-link active d-inline-flex align-items-center" href="/user/{{Auth::id()}}"><i class="fa fa-user" style="font-size:20px; color: white"></i><span> </span>{{Auth::user()->name}}</a>
                        <a class="btn btn-outline-warning" href="{{url('logout')}}">Выход</a>
                    </ul>
                @endif
            </div>
        </div>
    </nav>
</header>
