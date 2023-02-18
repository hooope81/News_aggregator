@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-8 blog-main">
           <div class="blog-post">
                <h2 class="blog-post-title">{{ $news->title }}</h2>
                <br>
                @if($news->image)
                    <br>
                    <img src="{{ $news->image }}" style="width:500px;" alt="image_news">
                    <br>
                    <br>
                @endif
                <p class="blog-post-meta">{{ $news->created_at }} <a href="#">{{ $news->author }}</a></p>
               {{ $news->description }}
            </div><!-- /.blog-post -->
        </div><!-- /.blog-main -->
    </div><!-- /.row -->
@endsection
