@extends('layouts.admin')
@section('title')  @endsection
@section('content')
    <h2 class="float-center d-block mt-2 mr-1 text-center">Создать новость</h2>
    <div class="raw">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form action="{{route('admin.news.store')}}" method="post" >
            @csrf
            <label for="category_id">
                Категория
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
                <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
            </div>
            <div class="form-group">
                <label for="author">
                    Автор
                </label>
                <input type="text" class="form-control" name="author" id="author" value="{{old('author')}}">
            </div>

            <div class="form-group">
                <label for="image">
                    Изображение
                </label>
                <input type="text" class="form-control" name="image" id="image" value="{{old('image')}}">
            </div>
            <label for="status">
                Статус
            </label>

            <select name="status" id="status" class="form-control">
                <option @if(old('status') === 'DRAFT') selected @endif>DRAFT</option>
                <option @if(old('status') === 'ACTIVE') selected @endif>ACTIVE</option>
                <option @if(old('status') === 'BLOCKED') selected @endif>BLOCKED</option>
            </select>
            <div class="form-group">
                <label for="description">
                    Описание
                </label>
                <textarea class="form-control" name="description" id="description">{{old('description')}}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Отправить</button>
        </form>
    </div>
@endsection


