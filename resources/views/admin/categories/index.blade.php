@extends('layouts.admin')
@section('style')
<link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
@stop
@section('content')
<div class="col">
    <div class="card shadow">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">All Categories</h3>
                </div>
                <div class="col text-right">
                    <a href="{{route('category.create')}}" class="btn btn-sm btn-primary">Create New Category</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Category Name</th>
                        <th class="text-center" scope="col">Edit</th>
                        <th class="text-center" scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($categories) > 0)    
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-info btn-sm">Edit</a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center">No Categories Available</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
@if(Session::has('success'))
    <script>
    toastr.options = {
        "positionClass": "toast-top-left",
    }
        toastr.success("{{Session::get('success')}}")
    </script>
@endif
@stop