@extends('layouts.admin')
@section('title') News list @parent @endsection
@section('content')
    <h2 class="float-center d-block mt-3 mb-3 mr-3 text-center">News</h2>
    <a href="{{route('admin.news.create')}}" class="float-right d-block mt-3 mb-3 mr-3 text-center" >Create news</a>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>status</th>
                <th>image</th>
                <th>Description</th>
                <th>Option</th>
            </tr>
            </thead>
            <tbody>
            @forelse($newsList as $news)
                <tr>
                    <td>{{$news->id}}</td>
                    <td>{{$news->title}}</td>
                    <td>{{$news->author}}</td>
                    <td>{{$news->status}}</td>
                    <td>{{$news->image}}</td>
                    <td>{{$news->description}}</td>
                    <td>
                        <a href="{{route('admin.news.edit',['news' => $news->id])}}">Edit</a>
                        <a href="javascript:;" style="color: red">Delete</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Not categories</td></tr>
            @endforelse
            </tbody>

        </table>
    </div>
@endsection
