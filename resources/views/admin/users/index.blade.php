@extends('layouts.admin')
@section('title') Пользователи @endsection
@section('content')
    <h2 class="float-center d-block mt-2 mr-1 text-center">Пользователи</h2>
    @include('inc.messages')

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Имя</th>
                    <th>Почта</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <a href="{{route('admin.users.edit',['user' => $user])}}">Редактировать</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">Пользователи отсутствуют</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

