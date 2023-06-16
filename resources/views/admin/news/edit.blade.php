@extends('layouts.admin')
@section('title') Редактирование новостей @endsection
@section('content')
    <h2 class="float-center d-block mt-2 mr-1 text-center">Редактирование новостей</h2>
    <div class="raw">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form action="{{route('admin.news.update', ['news'=>$news])}}" method="post" >
            @csrf
            @method('put')
            <label for="category_id">
                Категории
            </label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{$category->id}}"
                            @if($category->id === old('category_id'))
                                selected
                        @endif
                    >{{$category->title}}</option>

                @endforeach
            </select>
            <div class="form-group">
                <label for="title">
                    Наименование
                </label>
                <input type="text" class="form-control" name="title" id="title" value="{{$news->title}}">
            </div>
            <div class="form-group">
                <label for="author">
                    Автор
                </label>
                <input type="text" class="form-control" name="author" id="author" value="{{$news->author}}">
            </div>

            <div class="form-group">
                <label for="image">
                    Изображение
                </label>
                <input type="text" class="form-control" name="image" id="image" value="{{$news->image}}">
            </div>
            <label for="status">
                Статус
            </label>

            <select name="status" id="status" class="form-control">
                <option @if($news->status === 'DRAFT') selected @endif>DRAFT</option>
                <option @if($news->status  === 'ACTIVE') selected @endif>ACTIVE</option>
                <option @if($news->status === 'BLOCKED') selected @endif>BLOCKED</option>
            </select>
            <div class="form-group">
                <label for="description">
                    Описание
                </label>
                <textarea class="form-control" name="description" id="description">{{$news->description}}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection


