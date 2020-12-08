@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span>{{ __('My Articles') }}</span>
                    </div>
                    @foreach($articles as $article)
                        <div class="card-body align-center">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2 text-muted">{{$article->user->name}}</h6>
                                    <h6 class="card-subtitle mb-2 text-muted">{{$article->publish_date}}</h6>
                                    <h5 class="card-subtitle mb-2 text-muted">Article Title</h5>
                                    <h5 class="card-title">{{$article->title}}</h5>
                                    <div class="btn-group">
                                    <form onsubmit="return confirm('{{__("Are your sure to delete this Article?")}}')"
                                          method="POST" action="{{route('my_articles.destroy',$article->id)}}">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="articleId" value="{{$article->id}}"/>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-outline-danger">
                                                    {{ __('Delete') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                        @if($article->status=='Pending')
                                            <form method="POST" action="{{route("my_articles.update",$article->id)}}">
                                                @csrf
                                                @method('put')
                                            <div class="form-group row mb-8">
                                                <div class="col-md-12 offset-md-1">
                                                    <button type="submit"
                                                       class="btn btn-outline-info">
                                                        {{ __('Publish') }}
                                                    </button>
                                                </div>
                                            </div>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
