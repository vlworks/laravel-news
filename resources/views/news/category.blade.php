@extends('layouts.main')

@section('title')
    @parent Категорий
@endsection

@section('menu')
    @include('menu.main')
@endsection

@section('content')
    <h2>Категории новостей</h2>
    @forelse($categories as $item)
        <div>
            <h2><a href="{{ route('news.categoryId', $item['name']) }}">{{ $item['category'] }}</a></h2>
        </div>
    @empty
        <p>Нет категорий</p>
    @endforelse
@endsection
