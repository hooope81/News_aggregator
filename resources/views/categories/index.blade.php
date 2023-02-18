@extends('layouts.categories')
@section('content')
    <div class="row">
    @foreach($categories as $item)
        <div class="col-md-4">
            <h2>{{ $item->title }}</h2>
            <p>{{ $item->description }}</p>
            <p><a class="btn btn-secondary" href="{{ route('categories.show', ['id' => $item->id]) }}" role="button">Читать далее &raquo;</a></p>
            <br>

        </div>
@endforeach
    </div>
<!-- /container -->
@endsection
