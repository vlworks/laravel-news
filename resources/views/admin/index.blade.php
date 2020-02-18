@extends('layouts.main')

@section('title')
    @parent Админка
@endsection

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <div class="container">
        <h2>Добро пожаловать Admin!</h2>
    </div>
@endsection
