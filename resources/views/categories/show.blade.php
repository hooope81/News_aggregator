@extends('layouts.categories')
@section('content')
    <div class="row mb-2">
@forelse($news as $n)
    <div class="col-md-6">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
                <strong class="d-inline-block mb-2 text-primary">{{ $n->autor }}</strong>
                <h3 class="mb-0">
                    <a class="text-dark" href="{{ route('news.show', ['news' => $n]) }}">{{ $n->title }}</a>
                </h3>
                <br>
                <div class="mb-1 text-muted">{{ $n->created_at }}</div>
            </div>
        </div>
    </div>
@empty
    <h2>Новости по данной категории отсутствуют</h2>
@endforelse
    </div>
@endsection





