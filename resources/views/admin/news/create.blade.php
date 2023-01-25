@extends('layouts.admin')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">

            </div>

        </div>
    </div>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action="{{ route('admin.news.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" id="title" class="form-control" name="title" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" id="author" class="form-control" name="author" value="{{ old('author') }}">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea id="description" class="form-control" name="description">{{ old('description') }}</textarea>
            </div>

            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>

        </form>
    </div>

@endsection
