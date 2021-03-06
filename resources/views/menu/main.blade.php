<header>
    <div class="container">
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <h5 class="my-0 mr-md-auto font-weight-normal">Новостной агрегатор</h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark active" href="{{ route('home') }}">Главная</a>
                <a class="p-2 text-dark" href="{{ route('news.all') }}">Новости</a>
                <a class="p-2 text-dark" href="{{ route('news.categories') }}">Категории</a>
                @if(!empty(Auth::user()->is_admin))
                <a class="p-2 text-dark" href="{{ route('admin.admin') }}">Админка</a>
                @else
                @endif
                <img class="avatar" src="{{ (Auth::id())? Auth::user()->avatar :'' }}" alt="" width="30px" style="">
            </nav>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else

                    <li class="nav-item dropdown">

                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('profile') }}">
                                {{ __('Profile') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>


        </div>
    </div>
</header>