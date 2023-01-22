@extends('layouts.categories')
@section('content')
    <div class="row">
    @foreach($categories as $item)
        <div class="col-md-4">
            <h2>{{ $item['title'] }}</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-secondary" href="{{ route('categories.show', ['id' => $item['id']]) }}" role="button">Читать далее &raquo;</a></p>
            <br>
        </div>
@endforeach
    </div>
<!-- /container -->
@endsection
