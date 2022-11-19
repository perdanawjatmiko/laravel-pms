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
                <a href="javascript:history.back()">
                <button type="button" class="btn btn-alt-primary m-1">
                    <i class="fa fa-fw fa-arrow-left opacity-50 me-1"></i> Go Back
                </button>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- END Hero -->
    <div class="content content-full">
        <div class="row">
            <div class="col-lg-8">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h2 class="block-title"> <i class="fa fa-fw fa-user-circle"></i> Edit <strong> {{ $user->fname." ".$user->lname }} </strong></h2>
                    </div>
                    <div class="block-content">
                        <div class="row">
                            <div class="col-lg-2">

                            </div>
                            <div class="col-lg-8">
                                <form action="{{ url('users/'.$user->username) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row mb-4">
                                        <div class="col-lg-4">
                                            <label for="fname" class="form-label">First Name</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" name="fname" id="fname" class="form-control @error('fname') is-invalid @enderror" value="{{ old('fname', $user->fname) }}">
                                            @error('fname')
                                                <div class="invalid-feedback">
                                                    This field is Required <i class="fa fa-circle-exclamation"></i>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-4">
                                            <label for="lname" class="form-label">Last Name</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" name="lname" id="lname" class="form-control @error('lname') is-invalid @enderror" value="{{ old('lname', $user->lname) }}">
                                            @error('lname')
                                                <div class="invalid-feedback">
                                                    This field is Required <i class="fa fa-circle-exclamation"></i>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-4">
                                            <label for="username" class="form-label">Username</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $user->username) }}">
                                            @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }} <i class="fa fa-circle-exclamation"></i>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-4">
                                            <label for="email" class="form-label">E-mail</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }} <i class="fa fa-circle-exclamation"></i>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-4">
                                            <label for="password" class="form-label">Password</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="password" name="password" id="password" class="form-control">
                                            <p style="font-size: 80%">Leave this field empty if you don't want to change your password</p>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-4">
                                            <label for="role_id" class="form-label">Role</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <select name="role_id" id="role_id" class="form-select @error('role_id') is-invalid @enderror" >
                                                @foreach ($role as $r)
                                                @if ($user->role_id == $r->id)
                                                    <option value="{{ $r->id }}" selected>{{ $r->name }}</option>
                                                @else
                                                    <option value="{{ $r->id }}">{{ $r->name }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            @error('role_id')
                                                <div class="invalid-feedback">
                                                    This field is Required <i class="fa fa-circle-exclamation"></i>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-4">

                                        </div>
                                        <div class="col-lg-8">
                                            <label class="form-label">Your Avatar</label>
                                            <div class="push">
                                                <img class="img-preview img-avatar img-avatar96" src="{{ asset('storage/'.$user->avatar) }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-4">
                                            <label for="avatar" class="form-label">Change Avatar</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="file" name="avatar" id="avatar" class="form-control" onchange="previewImage()">
                                            <p style="font-size: 80%">Leave this field empty if you don't want to change your avatar</p>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-4">
                                            
                                        </div>
                                        <div class="col-lg-8">
                                            <button type="submit" class="btn btn-success btn-block">Save Changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>           
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Preview Image
        function previewImage() {
            const image = document.querySelector('#avatar');
            const imgPreview = document.querySelector('.img-preview');

            // imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        }
    </script>
@endsection