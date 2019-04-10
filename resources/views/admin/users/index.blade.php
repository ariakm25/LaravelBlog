@extends('layouts.admin')
@section('style')
<link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
@stop
@section('content')
<div class="col">
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">All Users</h3>
                </div>
                <div class="col text-right">
                    <a href="{{route('profile.edit', ['id' => Auth::user()->id])}}" class="btn btn-sm btn-info">Edit My Profile</a>
                    <a href="{{route('user.create')}}" class="btn btn-sm btn-primary">Create New User</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th class="text-center" scope="col">Edit</th>
                <th class="text-center" scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">
                            <div class="media align-items-center">
                            <div class="avatar rounded-circle mr-3">
                                <img src="{{asset($user->profile->avatar)}}">
                            </div>
                            <div class="media-body">
                                <span class="mb-0 text-sm">{{$user->name}}</span>
                            </div>
                            </div>
                        </th>
                        <td>
                            {{$user->email}}
                        </td>
                        <td class="text-center">
                            <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-info btn-sm">Edit</a>
                        </td>
                        <td class="text-center">
                            @if(Auth::id() != $user->id)
                            <a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
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