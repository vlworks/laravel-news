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
                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Добавить категорию
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse @if(old('add') === 'category') show @endif" aria-labelledby="headingOne"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <!-- Тело вкладки -->
                                <form action="{{route('admin.news')}}" class="needs-validation" novalidate="" method="POST">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="сategory">Назовите категорию</label>
                                            <input type="text" class="form-control" id="category" placeholder=""
                                                   value="{{ old('categoryName') }}" required="" name="category">
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label for="newsCategory" class="alert-light">Текущие категории</label>
                                            <select class="custom-select d-block w-100" id="newsCategory" required="">
                                                @forelse($category as $item)
                                                    <option class="alert-light">{{ $item->category }}</option>
                                                @empty
                                                    <option class="alert-light">Нет категорий ...</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="add" value="category">Добавить категорию
                                    </button>
                                </form>
                                <!-- Тело вкладки -->
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                    Добавить новость
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse @if(old('add') === 'news') show @endif" aria-labelledby="headingOne"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <!-- Тело вкладки -->
                                <form action="" method="POST" class="needs-validation" novalidate="" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="newsHeader">Заголовок</label>
                                            <input name="newsHeader" type="text" class="form-control" id="newsHeader" placeholder=""
                                                   value="{{ old('newsHeader') }}" required="">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="newsText">Текст новости</label>
                                        <textarea name="newsText" rows="5" type="text" class="form-control" id="newsText" placeholder=""
                                                  required="">{{ old('newsText') }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                            <label for="newsCategory">Категория</label>
                                            <select name="newsCategory" class="custom-select d-block w-100" id="newsCategory" required="">
                                                @forelse($category as $item)
                                                    <option @if($item->id == old('newsCategory')) selected @endif value="{{ $item->id }}">{{ $item->category }}</option>
                                                @empty
                                                    <option>Нет категорий ...</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                    <div class="mb-3">
                                        <label for="newsText">Загрузить картинку</label><br>
                                        <input type="file" name="image">
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input checked name="isPrivate" value="0" type="hidden" class="custom-control-input">
                                        <input @if(old('isPrivate')) checked @endif name="isPrivate" value="1" type="checkbox" class="custom-control-input" id="newsPrivate">
                                        <label class="custom-control-label" for="newsPrivate">Сделать приватной</label>
                                    </div>
                                    <hr class="mb-4">
                                    <button name="add" value="news" class="btn btn-primary btn-lg btn-block" type="submit">Добавить новость
                                    </button>
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
