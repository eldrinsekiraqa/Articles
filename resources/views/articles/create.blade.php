@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('home')}}" class="btn btn-outline-primary btn-sm  float-left" role="button" aria-pressed="true">< Home</a>
                        <span class="float-right">{{ __('Create an Article') }}</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route("articles.store")}}">
                            @csrf
                            <div class="form-group">
                                <label for="title">Article Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Article Title" required>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option>Publish</option>
                                    <option>Pending</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
