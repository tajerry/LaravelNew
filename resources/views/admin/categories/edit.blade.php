@extends('layouts.admin')
@section('title') Редактирование категории @endsection
@section('content')
    @include('inc.messages')
    <h2 class="float-center d-block mt-2 mr-1 text-center">Редакирование категории</h2>
    <div class="raw">
        <form action="{{route('admin.categories.update', ['category' => $category])}} " method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">
                    Наименование
                </label>
                <input type="text" class="form-control" name="title" id="title" value="{{$category->title}}">
            </div>
            <div class="form-group">
                <label for="description">
                    Описание
                </label>
                <textarea class="form-control" name="description" id="description" >{{$category->description}}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Отправить</button>
        </form>
    </div>
@endsection

