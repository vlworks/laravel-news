@extends('layouts.main')

@section('menu')
    @include('menu.main')
@endsection

@section('content')

    <main role="main">
        <div class="container">
            <section class="jumbotron text-center">
                <div class="container">
                    <h1>Добро пожаловать на новостной портал</h1>
                </div>
            </section>
            <h4>Последние новости</h4>
            <div class="album py-5 bg-light">
                <div class="row">
                    @forelse($news as $item)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="@if($item->image != 'default') {{ $item->image }}
                                        @else {{ 'http://placekitten.com/g/200/200' }}
                                        @endif" alt="placeholder">
                            <div class="card-body">
                                <h3>{{ $item->title }}</h3>
{{--                                <p class="card-text">{{ $item['text'] }}</p>--}}
                                <div class="d-flex justify-content-between align-items-center">
                                    @if (!$item->isPrivate || Auth::id())
                                        <div class="btn-group">
                                            <a href="{{ route('news.One', $item->id) }}" type="button" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                                        </div>
                                    @endif
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        Нет новостей
                    @endforelse
                </div>
            </div>
        </div>
    </main>



@endsection

@section('footer')
    @include('menu.footer')
@endsection
