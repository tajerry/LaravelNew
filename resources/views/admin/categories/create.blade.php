@extends('layouts.admin')
@section('title') Categories create @endsection
@section('content')
    <h2 class="float-center d-block mt-2 mr-1 text-center">Category create</h2>
    <div class="raw">
        <form action="post">
            <div class="form-group">
                <label for="title">
                    Title
                </label>
                <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="form-group">
                <label for="description">
                    Description
                </label>
                <textarea class="form-control" name="description" id="description"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
