@extends('layouts.admin')
@section('style')
<link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
@stop
@section('content')
<div class="row">
    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
        <div class="card card-profile shadow">
            <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                    <div class="card-profile-image">
                        <img src="{{asset($user->profile->avatar)}}" class="rounded-circle bg-white">
                    </div>
                </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                <div class="d-flex justify-content-between">
                    <a href="{{$user->profile->facebook}}" target="_blank" class="btn btn-sm btn-primary mr-4">Facebook</a>
                    <a href="{{$user->profile->website}}" target="_blank" class="btn btn-sm btn-default float-right">Website</a>
                </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
                <div class="row">
                    <div class="col">
                        <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                            <div>
                                <span class="heading">10</span>
                                <span class="description">Posts</span>
                            </div>
                            <div>
                                <span class="heading">89</span>
                                <span class="description">Apps</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <h3>
                        {{$user->name}}
                    </h3>
                    <div class="h5 mt-4">
                        {{$user->email}}
                    </div>
                    <hr class="my-4">
                    <p>{{$user->profile->about}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 order-xl-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <h3 class="ml-3">My Profile</h3>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h6 class="heading-small text-muted mb-4">User information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control form-control-alternative" placeholder="Username" value="{{$user->name}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="email">Email address</label>
                                    <input type="email" id="email" class="form-control form-control-alternative" placeholder="{{$user->email}}" disabled>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="password">Password</label>
                                    <input name="password" class="form-control form-control-alternative" placeholder="Enter New Password or Current Password" type="password" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="avatar">Avatar</label>
                                    <input name="avatar" class="form-control form-control-alternative" type="file">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <!-- Description -->
                    <h6 class="heading-small text-muted mb-4">About me</h6>
                    <div class="pl-lg-4">
                        <div class="form-group focused">
                            <label>About Me</label>
                            <textarea name="about" rows="4" class="form-control form-control-alternative" placeholder="A few words about you ...">{{$user->profile->about}}</textarea>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mt-4">Update</button>
                    </div>
                </form>
            </div>
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