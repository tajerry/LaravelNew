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
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->news->count()}}</td>
                        <td>{{$category->title}}</td>
                        <td>{{$category->description}}</td>
                        <td>
                            <a href="{{route('admin.categories.edit',['category' => $category->id])}}">Редактировать</a>
                            <form action="{{route('admin.categories.destroy', ['category' => $category])}} " method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" >Удалить</button>
                            </form>

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

