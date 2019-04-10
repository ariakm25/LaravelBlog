@extends('layouts.admin')

@section('content')
<div class="col">
    @include('admin.includes.errors')
    <div class="card shadow">
        <div class="card-header">
            Edit Post {{$posts->title}}
        </div>
        <div class="card-body">
            <form action="{{route('post.update', ['id' => $posts->id])}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{$posts->title}}">
                </div>
                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file" name="featured" class="form-control-file">
                    <img class="mt-3 text-center" width="50%" src="{{$posts->featured}}">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                            @if($posts->category->id == $category->id)
                                selected
                            @endif  
                            >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <div class="checkbox">
                        @foreach($tags as $tag)
                            <label><input type="checkbox" name="tags[]" value="{{$tag->id}}"
                            @foreach($posts->tags as $t)
                                @if($tag->id == $t->id)
                                    checked
                                @endif
                            @endforeach
                            > {{$tag->tag}}</label>
                        @endforeach
                    </div>    
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" class="form-control" cols="5" rows="5">{{$posts->content}}</textarea>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" cols="5" rows="5">{{$posts->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="keyword">Keyword</label>
                    <textarea name="keyword" id="keyword" class="form-control" cols="5" rows="5">{{$posts->keyword}}</textarea>
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