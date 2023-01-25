@extends('layouts.main')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Форма обратной связи</h1>
    </div>
    <div>
        <form method="post" action="{{ route('storeUserForm') }}">
            @csrf
            <div class="form-group">
                <label for="login">Логин</label>
                <input type="text" id="login" class="form-control" name="login" value="{{ old('login') }}">
            </div>
            <div class="form-group">
                <label for="comment">Комментарий</label>
                <textarea id="comment" class="form-control" name="comment">{{ old('comment') }}</textarea>
            </div>

            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>

        </form>
    </div>

@endsection
