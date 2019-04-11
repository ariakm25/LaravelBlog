@extends('layouts.admin')

@section('content')
<div class="col">
    @include('admin.includes.errors')
    <div class="card shadow">
        <div class="card-header">
            Edit App: {{$apps->title}}
        </div>
        <div class="card-body">
            <form action="{{ route('app.update', ['id' => $apps->id]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{$apps->title}}">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category_app_id" id="category" class="form-control">
                        @foreach($categories as $category)
                            <option class="form-control" value="{{$category->id}}"
                            @if($apps->category_app->id == $category->id)
                                selected
                            @endif
                            >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="platform">Platform</label>
                    <select name="platform" class="form-control" id="platform">
                        <option value="Android" class="form-control"
                        @if($apps->platform == "Android")
                                selected
                        @endif
                        >Android</option>
                        <option value="Windows" class="form-control"
                        @if($apps->platform == "Windows")
                                selected
                        @endif
                        >Windows</option>
                        <option value="iOS" class="form-control"
                        @if($apps->platform == "iOS")
                                selected
                        @endif
                        >iOS</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="license">License</label>
                    <select name="license" class="form-control" id="license">
                        <option value="Free" class="form-control"
                        @if($apps->license == "Free")
                                selected
                        @endif
                        >Free</option>
                        <option value="Paid" class="form-control"
                        @if($apps->license == "Paid")
                                selected
                        @endif>Paid</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="size">Size</label>
                    <input type="text" name="size" class="form-control" value="{{$apps->size}}">
                </div>
                <div class="form-group">
                    <label for="rating">Rating</label>
                    <input type="text" name="rating" class="form-control" value="{{$apps->rating}}">
                </div>
                <div class="form-group">
                    <label for="version">Version</label>
                    <input type="text" name="version" class="form-control" value="{{$apps->version}}">
                </div>
                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file" name="featured" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" class="form-control" cols="5" rows="5">{{$apps->content}}</textarea>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" cols="5" rows="5">{{$apps->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="keyword">Keyword</label>
                    <textarea name="keyword" id="keyword" class="form-control" cols="5" rows="5">{{$apps->keyword}}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success btn-block" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('script')
<script src="https://cdn.ckeditor.com/4.11.4/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
    CKEDITOR.config.height = 800; 
</script>
@stop