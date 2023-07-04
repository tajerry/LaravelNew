@extends('layouts.admin')
@section('title') Категории @endsection
@section('content')
    <h2 class="float-center d-block mt-2 mr-1 text-center">Категории</h2>
    @include('inc.messages')
    <div class="mb-3 pb-3">
        <a href="{!! route('admin.categories.create') !!}" class="float-right d-block  mb-3 mr-3 text-center" >Создать категорию</a><br>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Количество новостей</th>
                    <th>Наименование</th>
                    <th>Описание</th>
                    <th>Опции</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr id="{{$category->id}}">
                        <td>{{$category->id}}</td>
                        <td>{{$category->news->count()}}</td>
                        <td>{{$category->title}}</td>
                        <td>{{$category->description}}</td>
                        <td>
                            <a href="{{route('admin.categories.edit',['category' => $category->id])}}">Редактировать</a>
                            <a href="javascript:void(0)" data-id="{{ $category->id }}" onclick="deleteCategory(event.target)">Удалить</a>

                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">Категории отсутствуют</td></tr>
                @endforelse
            </tbody>
        </table>
        {{$categories->links()}}
    </div>
@endsection
<script>
    function deleteCategory(event){
        let id = $(event).data('id');
        let _url = `/admin/categories/${id}`;
        let _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax ({
            url: _url,
            type: 'DELETE',
            data:{
                _token: _token
            },
            success: function(request){
                $(`#${id}`).remove();
            }
        });
    }
</script>
