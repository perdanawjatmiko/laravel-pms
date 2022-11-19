@extends('layouts.app')
@section('content')
<!-- Hero -->
<div class="bg-image" style="background-image: url('/assets/media/photos/photo13@2x.jpg');">
    <div class="bg-black-50">
        <div class="content content-full">
            <h1 class="fs-2 text-white my-2">
                <i class="fa fa-pencil text-white-50 me-1"></i> Edit Project {{ $project->name }}
            </h1>
        </div>
    </div>
</div>
<!-- END Hero -->
    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <form action="{{ url('projects/'.$project->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <!-- Vital Info -->
                    <h2 class="content-heading pt-0">Vital Info</h2>
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Some vital information about your new project
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="mb-4">
                                <label class="form-label" for="name">
                                    Project Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                    placeholder="eg: example.com" value="{{ $project->name }}">
                                @error('name') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="name">
                                    Slug <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                                    value="{{ $project->slug }}">
                                @error('slug') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-lg-8">
                                    <label class="form-label" for="category_id">
                                        Category <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select" id="category_id" name="category_id">
                                        <option value="" selected>Select a category</option>
                                        @foreach ($categories as $cat)
                                        @if ($project->category_id == $cat->id)
                                            <option value="{{ $cat->id }}" selected>{{ $cat->name }}</option>
                                        @else
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endif
                                        @endforeach
                                            @error('category_id') 
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-8">
                                    <label class="form-label" for="status">
                                        Status <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                                        @foreach ($status as $stat)
                                        @if ($project->status == $stat->id)
                                            <option value="{{ $stat->id }}" selected>{{ $stat->name }}</option>
                                        @else
                                            <option value="{{ $stat->id }}">{{ $stat->name }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Vital Info -->
    
                    <!-- Optional Info -->
                    <h2 class="content-heading pt-0">Optional Info</h2>
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="text-muted">
                                You can add more details if you like but it is not required
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="mb-4">
                                <label class="form-label" for="description">Description</label>
                                <textarea class="form-control" id="description"
                                    name="description" rows="6"
                                    placeholder="What is this project about?">{{ $project->description }}</textarea>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <!-- Bootstrap Datepicker (.js-datepicker class are initialized in Helpers.jqDatepicker()) -->
                                    <!-- For more info and examples you can check out https://github.com/eternicode/bootstrap-datepicker -->
                                    <label class="form-label" for="deadline">Deadline</label>
                                    <input type="text" class="js-datepicker form-control @error('deadline') is-invalid @enderror" id="deadline"
                                        name="deadline" data-week-start="1" data-autoclose="true"
                                        data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="select date" value="{{ $project->deadline }}">
                                        @error('deadline') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                            </div>
                            {{-- <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="color">Color</label>
                                    <input type="text" class="form-control" id="color"
                                        name="color" placeholder="#0665d0" value="{{ $project->color }}">
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <!-- END Optional Info -->   
                    <!-- Submit -->
                    <div class="row push">
                        <div class="col-lg-8 col-xl-5 offset-lg-4">
                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary">
                                    <i class="fa fa-check-circle me-1 opacity-50"></i> Save Changes
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- END Submit -->
                </form>
            </div>
        </div>
    </div>

@endsection