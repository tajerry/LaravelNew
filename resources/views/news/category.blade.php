@extends('layouts.main')
@section('content')
@foreach ($newsList as $news)

    <div class="news">
        <a href="{!! route('news.show',[
            'id' => $news['id']
        ])!!}">
            <h3>
                {!! $news['title'] !!}
            </h3>
        </a>
        <img src="{!! $news['image'] !!} " alt="">
        <br>
        <p>Status :<em>{!!$news['status']!!}</em></p>
        <p>Author :<em>{!! $news['author'] !!} </em></p>
        <a href="{!! route('news.category',[
            'category' => $news['category']
        ]) !!} ">
            <p>Category :<em>{!! $news['category'] !!} </em></p>
        </a>

        <p>{!! $news['description'] !!} </p>
    </div>
@endforeach
@endsection
