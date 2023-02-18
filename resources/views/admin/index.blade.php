@extends('layouts.admin')
@section('title') Админпанель @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Админка</h1>
    </div>
    <br>
    <a href="{{ route('admin.parser') }}">Парсить новости</a>
@endsection
