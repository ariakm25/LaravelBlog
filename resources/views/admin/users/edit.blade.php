@extends('layouts.admin')

@section('content')
<div class="col">
    @include('admin.includes.errors')
    <div class="card shadow">
        <div class="card-header">
            Update User : {{$user->name}}
        </div>
        <div class="card-body">
            <form action="{{ route('user.update', ['id' => $user->id]) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                        </div>
                        <input name="name" class="form-control" placeholder="Name" type="text" value="{{$user->name}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                        </div>
                        <input name="email" class="form-control" placeholder="Email" type="email" value="{{$user->email}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input name="password" class="form-control" placeholder="Enter New Password or Current Password" type="password" required>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-4">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop