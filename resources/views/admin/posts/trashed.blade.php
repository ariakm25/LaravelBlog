@extends('layouts.app')

@section('content')
<div class="col-lg-8">
    <div class="card">
        <div class="card-header">
            Trash List
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th class="text-center" scope="col">Edit</th>
                        <th class="text-center" scope="col">Restore</th>
                        <th class="text-center" scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if( count($trash) > 0 )
                        @foreach($trash as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td class="text-center">
                                    <a href="" class="btn btn-info btn-sm">Edit</a>
                                </td>
                                <td class="text-center">
                                    <a href="{{route('post.restore', ['id' => $post->id])}}" class="btn btn-success btn-sm">Restore</a>
                                </td>
                                <td class="text-center">
                                    <a href="{{route('post.deletePermanently', ['id' => $post->id])}}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center">No Trash Available</td>
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
        toastr.success("{{Session::get('success')}}")
    </script>
@endif
@stop