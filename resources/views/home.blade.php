@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Личный кабинет') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Добро пожаловать, {{ Auth::user()->name }}</h1>
                    @if(Auth::user()->is_admin)
                            <a class="nav-link" href="{{route('admin.index')}}">В Админку  </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
