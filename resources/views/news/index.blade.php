@extends('layouts.main')
@section('content')
    <div class="row mb-2">
@foreach ($news as $n)

        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-primary">{{ $n->title }}</strong>
                    <div class="mb-1 text-muted">{{ $n->created_at }}</div>
{{--                    <p class="card-text mb-auto">{{ $n->description }}</p>--}}
                    <a href="{{ route('news.show', ['news' => $n]) }}">Читать далее</a>
                </div>
                <img src="{{ $n->image ?? asset('storage/news/dEV4Epa2AkZhnH9xwTastSCxg93IBQqlX6FBxSiC.jpg')}}" style="width:320px;" alt="image_news">
            </div>
        </div>

@endforeach
    </div>
    {{ $news->links() }}
@endsection
