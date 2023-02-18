@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-2">
            <h2>Добро пожаловать!</h2>
            <br>
            <br>
            <a href="{{ route('account') }}">Пожалуйста, ввойдите или зарегистрируйтесь</a>
        </div>
    </div>
@endsection

