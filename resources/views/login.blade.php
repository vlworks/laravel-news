@extends('layouts.main')

@section('menu')
    @include('menu.main')
@endsection

@section('content')

    <main role="main">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form class="form-signin">
                        <h2 class="h3 mb-3 font-weight-normal">Войти</h2>
                        <input type="email" id="inputEmail" class="form-control" placeholder="Введите email" required="" autofocus="">
                        <br>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Введите пароль" required="">
                        <br>
                        <div class="checkbox mb-3">
                            <label>
                                <input type="checkbox" value="remember-me"> Запомнить меня
                            </label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
                        <p class="mt-5 mb-3 text-muted">© {{ date('Y') }}</p>
                    </form>
                </div>
            </div>
        </div>
    </main>



@endsection

@section('footer')
    @include('menu.footer')
@endsection
