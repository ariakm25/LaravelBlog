@extends('layouts.app')
@section('meta')
<title>{{$app->title}}</title>
<meta name="description" content="{{$app->description}}">
<meta name="keyword" content="{{$app->keyword}}">
@stop
@section('content')
    <div class="container">
        <h1>{{$app->title}}</h1>
        {!! $app->content !!}
    </div>
@stop