@extends('layouts.main')

@section('title')
    @parent Одна новость
@endsection

@section('menu')
    @include('menu.main')
@endsection

@section('content')
    @if (!$news['isPrivate'])
        <h2>{{ $news['title'] }}</h2>
        <p>{{ $news['text'] }}</p>
    @else
        <br>Нет прав!
    @endif
@endsection

