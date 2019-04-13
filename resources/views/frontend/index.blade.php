@extends('layouts.app')
@section('meta')
<title>Home</title>
@stop
@section('content')
<div class="row">
    @foreach($posts as $post)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img src="{{$post->featured}}" height="250px">
            <div class="card-body">
              <p class="card-text h5">{{$post->title}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    @foreach ($post->tags as $tag)
                        <p class="btn btn-sm btn-outline-secondary">{{$tag->tag}}</p>
                    @endforeach
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
    @endforeach
</div>
<div>
    {{$posts->links()}}
</div> 
@stop
@section('script')
@stop