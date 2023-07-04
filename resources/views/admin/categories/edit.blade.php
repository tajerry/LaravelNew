@extends('layouts.admin')
@section('title') Редактирование категории @endsection
@section('content')
    @include('inc.messages')
    <h2 class="float-center d-block mt-2 mr-1 text-center">Редактирование категории</h2>
    <div class="raw">
        <form action="{{route('admin.categories.update', ['category' => $category])}} " method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">
                    Наименование
                </label>
                <input type="text" class="form-control @if($errors->has('title'))  alert-danger @endif" name="title" id="title" value="{{$category->title}}">
                @error('title') <strong style="color:red">{{$message}}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="description">
                    Описание
                </label>
                <textarea class="form-control  @if($errors->has('description'))  alert-danger @endif" name="description" id="description">{{$category->description}}</textarea>
                @error('description') <strong style="color:red">{{$message}}</strong> @enderror
            </div>
            <button type="submit" class="btn btn-success">Отправить</button>
        </form>
    </div>
@endsection

