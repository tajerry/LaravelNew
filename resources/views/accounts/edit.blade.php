@extends('layouts.app')
@section('title') Редактирование данных @endsection
@section('content')
    @include('inc.messages')
    <h2 class="float-center d-block mt-2 mr-1 text-center">Редактирование данных</h2>
    <div class="raw">
        <form action="{{route('accounts.update', ['account' => Auth::user()])}} " method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">
                    Имя
                </label>
                <input type="text" class="form-control @if($errors->has('name'))  alert-danger @endif" name="name" id="name" value="{{Auth::user()->name}}">
                @error('name') <strong style="color:red">{{$message}}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="email">
                    Email
                </label>
                <textarea class="form-control  @if($errors->has('email'))  alert-danger @endif" name="email" id="email">{{Auth::user()->email}}</textarea>
                @error('email') <strong style="color:red">{{$message}}</strong> @enderror
            </div>

            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection

