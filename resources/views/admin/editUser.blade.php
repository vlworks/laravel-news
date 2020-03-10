@extends('layouts.main')

@section('menu')
    @include('menu.admin')
@endsection

@section('content')

    <main role="main">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form class="form-signin" method="post" action="{{ route('admin.saveUser', $user) }}">
                        @csrf
                        <h2 class="h3 mb-3 font-weight-normal">Редактировать профиль</h2>
                        @if ($errors->has('name'))
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->get('name') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                        <input name="name" value="{{old('name') ?? $user->name}}" type="text" id="" class="form-control" placeholder="" autofocus="">
                        <br>
                        @if ($errors->has('email'))
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->get('email') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                        <input name="email" value="{{old('email') ?? $user->email}}" type="email" id="" class="form-control" placeholder="" autofocus="">
                        <br>
                        <div class="row">
                            <div class="col-9">
                                <button class="btn btn-lg btn-success btn-block" type="submit">Изменить</button>
                            </div>
                            <div class="col-3">
                                <a href="{{route('admin.admin')}}" class="btn btn-lg btn-danger btn-block" type="submit">Отмена</a>
                            </div>
                        </div>
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
