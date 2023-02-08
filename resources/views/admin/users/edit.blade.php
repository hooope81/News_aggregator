@extends('layouts.admin')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать статус пользователя</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action="{{ route('admin.users.update', ['user' => $user]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <h4>Имя</h4>
                <p>{{ $user->name }}</p>
                <h4>Почта</h4>
                <p>{{ $user->email }}</p>
                <h4>Подтверждение почты (да/нет)</h4>
                <p>
                    @if($user->email_verified_at)
                        да
                    @else
                        нет
                    @endif
                </p>
                <h4>Дата добавления</h4>
                <p>{{ $user->created_at }}</p>

                <div class="form-group">
                    <label for="is_admin">Статус</label>
                    <select class="form-control" name="is_admin" id="is_admin">
                            <option @if($user->is_admin) selected @endif value=1>Админ</option>
                            <option @if(!$user->is_admin) selected @endif value=0>Обычный пользователь</option>
                    </select>
                </div>

            </div>

            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>

        </form>
    </div>

@endsection



