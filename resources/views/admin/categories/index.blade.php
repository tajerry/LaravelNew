@extends('layouts.admin')
@section('title') Categories list @endsection
@section('content')
    <h2 class="float-center d-block mt-2 mr-1 text-center">Categories</h2>
    <div class="mb-3 pb-3">
        <a href="{!! route('admin.categories.create') !!}" class="float-right d-block  mb-3 mr-3 text-center" >Create category</a><br>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->title}}</td>
                        <td>{{$category->description}}</td>
                        <td>
                            <a href="{{route('admin.categories.edit',['category' => $category->id])}}">Edit</a>
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

