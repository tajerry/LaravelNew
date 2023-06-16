@extends('layouts.admin')
@section('title') Новости @parent @endsection
@section('content')
    <h2 class="float-center d-block mt-3 mb-3 mr-3 text-center">Новости</h2>
    @include('inc.messages')
    <a href="{{route('admin.news.create')}}" class="float-right d-block mt-3 mb-3 mr-3 text-center" >Создать новость</a>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Категория</th>
                <th>Наименование</th>
                <th>Автор</th>
                <th>Статус</th>
                <th>Изображение</th>
                <th>Описание</th>
                <th>Опции</th>
            </tr>
            </thead>
            <tbody>
            @forelse($newsList as $news)
                <tr>
                    <td>{{$news->id}}</td>
                    <td>{{$news->category->title}}</td>
                    <td>{{$news->title}}</td>
                    <td>{{$news->author}}</td>
                    <td>{{$news->status}}</td>
                    <td>{{$news->image}}</td>
                    <td>{{$news->description}}</td>
                    <td>
                        <a href="{{route('admin.news.edit',['news' => $news->id])}}">Редактировать</a>
                        <form action="{{route('admin.news.destroy', ['news' => $news])}} " method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" >Удалить</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Новости отсутствуют</td></tr>
            @endforelse
            </tbody>

        </table>
        {{$newsList->links()}}
    </div>
@endsection

