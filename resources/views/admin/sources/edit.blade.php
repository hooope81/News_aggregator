@extends('layouts.admin')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать источник</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action="{{ route('admin.sources.update', ['source' => $source]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" id="title" class="form-control" name="title" value="{{ $source->title }}">
            </div>
            <div class="form-group">
                <label for="URL">Ссылка</label>
                <input type="text" id="URL" class="form-control" name="URL" value="{{ $source->URL }}">
            </div>

            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>

        </form>
    </div>

@endsection



