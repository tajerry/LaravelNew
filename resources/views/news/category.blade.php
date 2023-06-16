@extends('layouts.main')
@section('content')
    @forelse ($newsList as $news)
        <div class="col">
            <div class="card shadow-sm">
                <img src="{{$news->image}}" alt="">
                <div class="card-body">
                    <a href="{!! route('news.show',[
            'id' => $news->id
            ])!!}">
                        <h3>
                            {!! $news->title !!}
                        </h3>
                    </a>
                    <p>Статус :<em>{!!$news->status !!}</em></p>
                    <p>Автор :<em>{!!$news->author  !!}</em></p>
                    <a href="{!!route('news.category',[
                'category' => $news->category_id
                ])!!}">
                        <p>Категория :<em>{!!$news->category_id!!}</em></p>
                    </a>
                    <p>{!! $news->description !!}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Посмотреть</button>
                        </div>
                        <small class="text-muted">9 минут</small>
                    </div>
                </div>
            </div>
        </div>

        @endsection
