@extends('layouts.admin')
@section('title') News create @endsection
@section('content')
    <h2 class="float-center d-block mt-2 mr-1 text-center">New create</h2>
    <div class="raw">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form action="{{route('admin.news.store')}}" method="post" >
            @csrf
            <div class="form-group">
                <label for="title">
                    Title
                </label>
                <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
            </div>
            <div class="form-group">
                <label for="author">
                    Автор
                </label>
                <input type="text" class="form-control" name="author" id="author" value="{{old('author')}}">
            </div>
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
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection



