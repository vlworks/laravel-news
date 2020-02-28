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

    <div class="news">
        <div class="container">
            <table class="table table-hover table-sm">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Новости</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($news as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->title }}</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
                    @empty('Нет новостей')
                @endforelse
                </tbody>
            </table>
            {{ $news->links() }}
        </div>
    </div>

@endsection
