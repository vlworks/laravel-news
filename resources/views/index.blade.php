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

            <div class="album py-5 bg-light">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="http://placekitten.com/g/200/200" alt="placeholder">
                            <div class="card-body">
                                <h3>Header</h3>
                                <p class="card-text">This is a wider card with supporting text below as a natural
                                    lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary nav-link disabled">Edit</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



@endsection

@section('footer')
    @include('menu.footer')
@endsection
