@extends('layouts.admin')

@section('content')
<div class="col8">
    @include('admin.includes.errors')
    <div class="card shadow">
        <div class="card-header">
            Create New Category
        </div>
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="post">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Create Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop