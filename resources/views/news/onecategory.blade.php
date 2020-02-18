@extends('layouts.main')

@section('title')
    @parent Категории новостей
@endsection

@section('menu')
    @include('menu.main')
@endsection

@section('content')

    <div class="container">
        <div class="album py-5 bg-light">
            <h2>Новости по категории {{ $category }}</h2>
            <hr>
            <div class="row">
                @forelse($news as $item)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="http://placekitten.com/g/200/200" alt="placeholder">
                            <div class="card-body">
                                <h3>{{ $item['title'] }}</h3>
                                <p class="card-text">This is a wider card with supporting text below as a natural
                                    lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    @if (!$item['isPrivate'])
                                        <div class="btn-group">
                                            <a href="{{ route('news.One', $item['id']) }}" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                                        </div>
                                    @endif
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Нет новостей</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('menu.footer')
@endsection
