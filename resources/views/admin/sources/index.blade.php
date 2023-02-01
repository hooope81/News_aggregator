@extends('layouts.admin')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Список источников</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.sources.create') }}">Добавить источник</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Заголовок</th>
                <th>Ссылка</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($sources as $source)
                <tr>
                    <td>{{ $source->id }}</td>
                    <td>{{ $source->title }}</td>
                    <td>{{ $source->URL }}</td>
                    <td>{{ $source->created_at }}</td>
                    <td><a href="{{ route('admin.sources.edit', ['source' => $source]) }}">Изм.</a> &nbsp; <a href="" style="color: red">Уд.</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Записей нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{ $sources->links() }}

    </div>


@endsection