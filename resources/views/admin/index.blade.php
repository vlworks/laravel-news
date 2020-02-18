@extends('layouts.main')

@section('title')
    @parent Админка
@endsection

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <h1>Добро пожаловать Admin!</h1>
@endsection
