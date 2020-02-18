@extends('layouts.main')

@section('title')
    @parent Новости
@endsection

@section('menu')
    @include('menu.main')
@endsection

@section('content')
    @forelse($news as $item)
        <div>
            <h2>{{ $item['title'] }}</h2>
            @if (!$item['isPrivate'])
                <a href="{{ route('news.One', $item['id']) }}">Подробнее...</a>
            @endif
        </div>
        <hr>
    @empty
        <p>Нет новостей</p>
    @endforelse
@endsection
