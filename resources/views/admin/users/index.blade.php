@extends('layouts.admin')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Список пользователей</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Статус</th>
                <th>Имя</th>
                <th>Почта</th>
                <th>Подтверждение почты (да/нет)</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>@if($user->is_admin) админ @endif</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->email_verified_at)
                            да
                        @else
                            нет
                        @endif
                    </td>
                    <td>{{ $user->created_at }}</td>
                    <td><a href="{{ route('admin.users.edit', ['user' => $user]) }}">Изм.</a> &nbsp;
                </tr>
            @empty
                <tr>
                    <td colspan="7">Записей нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{ $users->links() }}

    </div>


@endsection

