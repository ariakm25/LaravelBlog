@extends('layouts.app')

@section('content')
<div class="col-lg-8">
    <div class="card">
        <div class="card-header">
            Tags List
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Tag Name</th>
                        <th class="text-center" scope="col">Edit</th>
                        <th class="text-center" scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($tags) > 0)    
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{ $tag->tag }}</td>
                                <td class="text-center">
                                    <a href="{{ route('tag.edit', ['id' => $tag->id]) }}" class="btn btn-info btn-sm">Edit</a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('tag.delete', ['id' => $tag->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center">No Tags Available</td>
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