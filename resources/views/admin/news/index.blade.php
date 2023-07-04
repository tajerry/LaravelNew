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
                <tr id="{{$news->id}}">
                    <td>{{$news->id}}</td>
                    <td>{{$news->category->title}}</td>
                    <td>{{$news->title}}</td>
                    <td>{{$news->author}}</td>
                    <td>{{$news->status}}</td>
                    <td>{{$news->image}}</td>
                    <td>{{$news->description}}</td>
                    <td>
                        <a href="{{route('admin.news.edit',['news' => $news])}}">Редактировать</a>
                        <a href="javascript:void(0)" data-id="{{ $news->id }}" onclick="deletePost(event.target)">Удалить</a>
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
<script>
    function deletePost(event) {
        var id  = $(event).data("id");
        let _url = `/admin/news/${id}`;
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: _url,
            type: 'DELETE',
            data: {
                _token: _token
            },
            success: function(response) {
                $(`#${id}`).remove();
            }
        });
    }

</script>

