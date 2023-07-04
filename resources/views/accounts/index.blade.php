@extends('layouts.app')
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
            <tr>
                    @if(Auth::user()->avatar)
                        <img src="{{Auth::user()->avatar}}" style="width:200px" alt="">
                    @endif
                <td>{{Auth::user()->id}}</td>
                <td>{{Auth::user()->name}}</td>
                <td>{{Auth::user()->email}}</td>
                <td>
                    <a href="{{route('accounts.edit',['account' => Auth::user()])}}">Редактировать</a>
                    <br>
                    @if(Auth::user()->is_admin)
                        <a href="{{route('admin.index')}}">В админку</a>
                    @endif

                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection

