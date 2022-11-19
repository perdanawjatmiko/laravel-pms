@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-8">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Add User</h3>
                    </div>
                    <div class="block-content">
                        <div class="row">
                            <div class="col-lg-2">

                            </div>
                            <div class="col-lg-8">
                                <form action="{{ url('/users') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-4">
                                        <div class="col-lg-4">
                                            <label for="fname" class="form-label">First Name</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" name="fname" id="fname" class="form-control @error('fname') is-invalid @enderror" value="{{ old('fname') }}">
                                            @error('fname')
                                                <div class="invalid-feedback">
                                                    {{ $message }}<i class="fa fa-circle-exclamation"></i>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-4">
                                            <label for="lname" class="form-label">Last Name</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" name="lname" id="lname" class="form-control @error('lname') is-invalid @enderror" value="{{ old('lname') }}">
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
                                            <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" autofocus>
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
                                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }} <i class="fa fa-circle-exclamation"></i>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-4">
                                            <label for="password" class="form-label">Password</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="password" name="password" id="password" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-4">
                                            <label for="role_id" class="form-label">Role</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <select name="role_id" id="role_id" class="form-select @error('role_id') is-invalid @enderror" required >
                                                <option value="" selected>Select Role</option>
                                                @foreach ($role as $r)
                                                    <option value="{{ $r->id }}">{{ $r->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('role_id')
                                                <div class="invalid-feedback">
                                                    This field is Required <i class="fa fa-circle-exclamation"></i>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-4">
                                            <label for="avatar" class="form-label">Avatar</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <img class="img-preview img-avatar img-avatar128 mb-3" src="{{ asset('/assets/media/avatars/avatar10.jpg') }}">
                                            <input type="file" name="avatar" id="avatar" class="form-control @error('avatar') is-invalid @enderror" onchange="previewImage()">
                                            @error('avatar')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-4">
                                            
                                        </div>
                                        <div class="col-lg-8">
                                            <button type="submit" class="btn btn-success btn-block">Submit</button>
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