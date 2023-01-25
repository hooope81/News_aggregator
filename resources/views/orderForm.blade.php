@extends('layouts.main')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Заказ на получение выгрузки данных из источника</h1>
    </div>
    <div>
        <form method="post" action="{{ route('storeOrderForm') }}">
            @csrf
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="tel" id="phone" class="form-control" name="phone" value="{{ old('phone') }}">
            </div>
            <div class="form-group">
                <label for="email">Почта</label>
                <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="info">Запрашиваемая информация</label>
                <textarea id="info" class="form-control" name="info">{{ old('comment') }}</textarea>
            </div>

            <br>
            <button type="submit" class="btn btn-success">Отправить</button>

        </form>
    </div>

@endsection
