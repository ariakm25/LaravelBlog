@extends('layouts.admin')

@section('content')
<div class="col">
    @include('admin.includes.errors')
    <div class="card shadow">
        <div class="card-header">
            Create New Post
        </div>
        <div class="card-body">
            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file" name="featured" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach($categories as $category)
                            <option class="form-control" value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags">Tags <small>(Separated with comma ( , )</small></label>
                    <input type="text" name="tags" class="form-control" value="{{ old('tags') }}">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" class="form-control" cols="5" rows="5">{{ old('content') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" cols="5" rows="5">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="keyword">Keyword</label>
                    <textarea name="keyword" id="keyword" class="form-control" cols="5" rows="5">{{ old('keyword') }}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success btn-block" type="submit">Create</button>
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