@extends('layouts.main')
@section('title') News create @endsection
@section('content')
    <h2 class="float-center d-block mt-2 mr-1 text-center">Создать комментарий</h2>
    <div class="raw">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form action="{{route('comment.store')}}" method="post" >
            @csrf
            <div class="form-group">
                <label for="name">
                    Имя
                </label>
                <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label for="Rating">
                    Рейтинг
                </label>
                <select name="rating" id="rating" class="form-control">
                    <option @if(old('rating') === '1') selected @endif>1</option>
                    <option @if(old('rating') === '2') selected @endif>2</option>
                    <option @if(old('rating') === '3') selected @endif>3</option>
                    <option @if(old('rating') === '4') selected @endif>4</option>
                    <option @if(old('rating') === '5') selected @endif>5</option>
                </select>
            </div>

            <div class="form-group">
                <label for="comment">
                    Комментарий
                </label>
                <textarea class="form-control" name="comment" id="comment">{{old('comment')}}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection



