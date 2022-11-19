@extends('layouts.app')
@section('content')
    <!-- Hero -->
    <div class="bg-image" style="background-image: url('/assets/media/photos/photo17@2x.jpg');">
        <div class="bg-black-25">
            <div class="content content-full">
                <div class="py-5 text-center">
                    <a class="img-link" href="#">
                        <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ asset('storage/'.$user->avatar) }}"
                            alt="">
                    </a>
                    <h1 class="fw-bold my-2 text-white">{{ $user->fname." ".$user->lname }}</h1>
                    <h2 class="h4 fw-bold text-white-75">
                        {{ $user->role->name }}
                    </h2>
                    <a href="{{ url('users/'.$user->username.'/edit') }}">
                    <button type="button" class="btn btn-primary m-1">
                        <i class="fa fa-fw fa-pencil opacity-50 me-1"></i> Edit Profile
                    </button>
                    </a>
                    <button type="button" class="btn btn-danger m-1">
                        <i class="fa fa-fw fa-lock opacity-50 me-1"></i> Change Password
                    </button>
                    <a href="javascript:history.back()">
                    <button type="button" class="btn btn-dark m-1">
                        <i class="fa fa-fw fa-arrow-left opacity-50 me-1"></i> Back
                    </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->
@endsection