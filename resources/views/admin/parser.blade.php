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
        <a href="" class="btn btn-success">Запарсить новости на сайт</a>
        <hr>
    </div>
    <div class="container">
        <h4>Добавить ресурс для парсинга новостей</h4>
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('admin.parser') }}" class="needs-validation" novalidate="" method="POST">
                    {{ csrf_field() }}
                    <div class="row align-content-center">
                        <div class="col-md-8">
                            @if ($errors->has('url'))
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->get('url') as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                            <label for="сategory">Укажите ресурс</label>
                            <input type="text" class="form-control" id="category" placeholder=""
                                   value="" required="" name="url">
                        </div>
                        <div class="col-md-4">
                            <br>
                            <button class="btn btn-primary btn-lg btn-block" type="submit" name="add" value="category">Добавить
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <p>Пример:</p>
                <code>https://news.yandex.ru/auto.rss</code>
                <code>https://news.yandex.ru/auto_racing.rss</code>
                <code>https://news.yandex.ru/army.rss</code>
            </div>
        </div>
        <hr>
        <div class="row">
            <h4>Текущие ресурсы</h4>
            <br>
            <div class="col-md-12">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">URI</th>
                        <th scope="col">Добавлен</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($resources as $elem)
                        <tr>
                            <th scope="row">{{ $elem->id }}</th>
                            <td>{{ $elem->url }}</td>
                            <td>{{ $elem->created_at }}</td>
                            <td><a href="{{ route('admin.deleteResource', $elem) }}" class="btn btn-danger btn-sm">Delete</a></td>
                        </tr>
                    @empty
                        Нет ресурсов
                    @endforelse
                    </tbody>
                </table>
            </div>
            <hr>
        </div>
    </div>


@endsection
