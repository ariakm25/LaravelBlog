@extends('layouts.app')
@section('meta')
<title>{{$post->title}}</title>
<meta name="description" content="{{$post->description}}">
<meta name="keyword" content="{{$post->keyword}}">
@stop
@section('content')
    <div class="container">
        <h1>{{$post->title}}</h1>
        {!! $post->content !!}
    </div>
@stop