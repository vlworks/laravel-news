@extends('layouts.main')

@section('title')
    @parent Одна новость
@endsection

@section('menu')
    @include('menu.main')
@endsection

@section('content')
    <div class="container">
        @if (!$news->isPrivate || Auth::id())
            <img src="@if($news->image != 'default') {{ $news->image }}
            @else {{ 'http://placekitten.com/g/200/200' }}
            @endif" alt="placeholder">
            <h2>{{ $news->title }}</h2>
            <p>{!! $news->text !!}</p>
        @else
            <br>Нет прав!
        @endif
    </div>
@endsection

@section('footer')
    @include('menu.footer')
@endsection