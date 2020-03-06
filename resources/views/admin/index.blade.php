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
            <h3>Новости:</h3>
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
                @foreach($news as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->title }}</td>
                    <td><a href="{{ route('admin.editNews', $item->id) }}" class="btn btn-warning">Edit</a></td>
                    <td><a href="{{ route('admin.deleteNews', $item->id) }}" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{ $news->links() }}
        </div>
    </div>
    <div class="users">
        <div class="container">
            <h3>Пользователи</h3>
            <table class="table table-hover table-sm">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Пользователь</th>
                    <th scope="col">email</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $item)
                    @if($item->name != 'admin')
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td><a href="" class="btn btn-warning">Edit</a></td>
                            <td><a href="{{ route('admin.deleteUser', $item->id) }}" class="btn btn-danger">Delete</a></td>
                            <td>
                                @if($item->is_admin)
                                    <a class="btn btn-danger" href="{{ route('admin.removeAdmin', $item->id) }}">Удалить права</a>
                                @else
                                    <a class="btn btn-warning" href="{{ route('admin.letAdmin', $item->id) }}">Сделать администратором</a>
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>

@endsection
