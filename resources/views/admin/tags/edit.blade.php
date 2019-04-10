@extends('layouts.admin')

@section('content')
<div class="col">
    @include('admin.includes.errors')
    <div class="card shadow">
        <div class="card-header">
            Edit Tag: {{$tag->tag}}
        </div>
        <div class="card-body">
            <form action="{{ route('tag.update', ['id' => $tag->id]) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="tag">Name</label>
                    <input type="text" name="tag" value="{{$tag->tag}}" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update Tag</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
