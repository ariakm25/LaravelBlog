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
                    <h3 class="mb-0">All Apps</h3>
                </div>
                <div class="col text-right">
                    <a href="{{route('app.create')}}" class="btn btn-sm btn-primary">Create New App</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Cover</th>
                        <th scope="col">Title</th>
                        <th class="text-center" scope="col">Category</th>
                        <th class="text-center" scope="col">Edit</th>
                        <th class="text-center" scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if( count($apps) > 0 )
                        @foreach($apps as $app)
                            <tr>
                                <td>
                                <div class="avatar rounded-circle mr-3">
                                    <img src="{{asset($app->featured)}}">
                                </div>
                                </td>
                                <td style="vertical-align: middle;">{{ $app->title }}</td>
                                <td style="vertical-align: middle;" class="text-center">
                                    {{$app->category_app->name}}
                                </td>
                                <td style="vertical-align: middle;" class="text-center">
                                    <a href="{{route('app.edit', ['id' => $app->id])}}" class="btn btn-info btn-sm">Edit</a>
                                </td>
                                <td style="vertical-align: middle;" class="text-center">
                                    <a href="{{route('app.delete', ['id' => $app->id])}}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @else   
                        <tr>
                            <td colspan="5" class="text-center">No Apps Available</td>
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