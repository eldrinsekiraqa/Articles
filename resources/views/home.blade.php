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
                @foreach($articles as $article)
                <div class="card-body align-center">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">{{$article->user->name}}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">{{$article->publish_date}}</h6>
                            <h5 class="card-subtitle mb-2 text-muted">Article Title</h5>
                            <h5 class="card-title">{{$article->title}}</h5>
                        </div>
                    </div>
                </div>
                    @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
