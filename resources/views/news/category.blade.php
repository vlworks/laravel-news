@extends('layouts.main')

@section('title')
    @parent Категорий
@endsection

@section('menu')
    @include('menu.main')
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 text-center">
                <ul class="list-group">
                    <li class="list-group-item active"><h4>Категории новостей <small>(категории выводятся из базы но ссылки отключены)</small></h4></li>
                    @forelse($categories as $item)
                    <li class="list-group-item">
                        <a class="btn disabled" aria-disabled="true" href="{{ route('news.categoryId', $item->name) }}">{{ $item->category }}</a>
                    </li>
                    @empty
                        <p>Нет категорий</p>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('menu.footer')
@endsection
