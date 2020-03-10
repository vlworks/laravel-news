@extends('layouts.main')

@section('title')
    @parent Парсер
@endsection

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <div class="container">
        <h2>Парсер</h2>
    </div>
    <div class="container">
        @forelse($data as $item)
            <span>{{ $item['Name'] }} - {{ $item['Value'] }}</span><br>
        @empty
            <span>Ничего не запарсил</span>
        @endforelse
    </div>


@endsection
