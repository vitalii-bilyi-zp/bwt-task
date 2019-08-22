@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header text-center">Добро пожаловать!</h2>
                <div class="card-body">
                    <p class="card-text">Для использования полного функционала приложения, пожалуйста, сначала <a class="btn btn-link p-0" href="{{ route('login') }}">авторизируйтесь.</a> Также не забывайте оставлять <a class="btn btn-link p-0" href="{{ url('reviews/form') }}">отзывы.</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
