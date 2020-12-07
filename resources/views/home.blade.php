@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span>{{ __('Home') }}</span>
                    <a href="{{route('articles.create')}}" class="btn btn-outline-primary btn-sm  float-right" role="button" aria-pressed="true">+ Article</a>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
