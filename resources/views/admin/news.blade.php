@extends('layouts.main')

@section('title')
    @parent Редактирование новостей
@endsection

@section('menu')
    @include('menu.admin')
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <h3>Редактирование новостей</h3>
                <hr>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Добавить категорию
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse hidden" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <!-- Тело вкладки -->
                                <form class="needs-validation" novalidate="">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="newsHeader">Назовите категорию</label>
                                            <input type="text" class="form-control" id="newsHeader" placeholder="" value="" required="">
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label for="newsCategory" class="alert-light">Текущие категории</label>
                                            <select class="custom-select d-block w-100" id="newsCategory" required="">
                                                @forelse($category as $item)
                                                    <option class="alert-light">{{ $item['category'] }}</option>
                                                @empty
                                                    <option class="alert-light">Нет категорий ...</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Добавить категорию</button>
                                </form>
                                <!-- Тело вкладки -->
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                    Добавить новость
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse hidden" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <!-- Тело вкладки -->
                                <form class="needs-validation" novalidate="">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="newsHeader">Заголовок</label>
                                            <input type="text" class="form-control" id="newsHeader" placeholder="" value="" required="">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="newsText">Текст новости</label>
                                        <textarea type="text" class="form-control" id="newsText" placeholder="" required=""></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                            <label for="newsCategory">Категория</label>
                                            <select class="custom-select d-block w-100" id="newsCategory" required="">
                                                @forelse($category as $item)
                                                    <option>{{ $item['category'] }}</option>
                                                @empty
                                                    <option>Нет категорий ...</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="newsPrivate">
                                        <label class="custom-control-label" for="newsPrivate">Сделать приватной</label>
                                    </div>
                                    <hr class="mb-4">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Добавить новость</button>
                                </form>
                                <!-- Тело вкладки -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
