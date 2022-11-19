@extends('layouts.app')
@section('content')
<div class="bg-image" style="background-image: url('assets/media/photos/photo13@2x.jpg');">
    <div class="bg-black-50">
        <div class="content content-full">
            <h1 class="fs-2 text-white my-2">
                <i class=""></i> Project Categories
            </h1>
        </div>
    </div>
</div>
<div class="content">
    {{-- Alert --}}
    @if (session()->has('add'))
    <div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert">
        <div class="flex-shrink-0">
            <i class="fa fa-fw fa-check"></i>
        </div>
        <div class="flex-grow-1 ms-3">
            <p class="mb-0">{{ session('add') }}
            </p>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif (session()->has('delete'))
    <div class="alert alert-danger alert-dismissible d-flex align-items-center" role="alert">
        <div class="flex-shrink-0">
            <i class="fa fa-fw fa-times"></i>
        </div>
        <div class="flex-grow-1 ms-3">
            <p class="mb-0">{{ session('delete') }}
            </p>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif (session()->has('edit'))
    <div class="alert alert-warning alert-dismissible d-flex align-items-center" role="alert">
        <div class="flex-shrink-0">
            <i class="fa fa-fw fa-exclamation"></i>
        </div>
        <div class="flex-grow-1 ms-3">
            <p class="mb-0">{{ session('edit') }}
            </p>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    {{-- end Alert --}}
    <div class="row">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="block block-rounded block-bordered">
                <form action="{{ url('/categories') }}" method="POST" enctype="multipart/form-data">
                    <div class="block-content">
                        <h2 class="content-heading pt-0"><i class="fa fa-plus"></i> Add Category</h2>
                        @csrf
                        <div class="row push">
                            <div class="mb-3">
                                <label for="name" class="form-label">Category Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row push">
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10"
                                    class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light text-end">
                        <button type="submit" class="btn btn-md btn-alt-success">
                            <i class="fa fa-check opacity-50 me-1"></i> Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="block block-rounded block-bordered">
                <div class="block-content">
                    <h2 class="content-heading pt-0"><i class="fa fa-box-archive"></i> All Category</h2>
                    <table class="table table-borderless table-striped table-vcenter table-responsive">
                        <thead>
                            <tr>
                                <th style="width: 5%">#</th>
                                <th class="">Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td class="">
                                    {{-- <a href="{{ url('project-categories/'.$category->slug.'/edit') }}"> --}}
                                        <button type="button" class="btn btn-sm btn-warning js-bs-tooltip-enabled"
                                            data-bs-toggle="modal" data-bs-target="#modalEdit-{{ $category->slug }}">
                                            <i class="fa fa-pencil-alt" style="color: white"></i>
                                        </button>
                                        {{-- </a> --}}
                                    <button type="button" class="btn btn-sm btn-danger js-bs-tooltip-enabled"
                                        data-bs-toggle="modal" data-bs-target="#modalDelete-{{ $category->slug }}">
                                        <i class="fa fa-trash" style="color: white"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Fade In Edit Modal -->
                            <div class="modal fade" id="modalEdit-{{ $category->slug }}" tabindex="-1" role="dialog"
                                aria-labelledby="modalEdit" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{ url('categories/'.$category->slug) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Category {{ $category->name }} </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body pb-1">
                                                <div class="row push">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Name</label>
                                                        <input type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            name="name" id="name" value="{{ $category->name }}">
                                                        @error('name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row push">
                                                    <div class="mb-3">
                                                        <label for="slug" class="form-label">Slug</label>
                                                        <input type="text"
                                                            class="form-control @error('slug') is-invalid @enderror"
                                                            name="slug" id="slug" value="{{ $category->slug }}">
                                                        @error('slug')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row push">
                                                    <div class="mb-3">
                                                        <label for="description" class="form-label">Description</label>
                                                        <textarea name="description" id="description" cols="30"
                                                            rows="10"
                                                            class="form-control">{{ $category->description }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-alt-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-alt-success"
                                                    data-bs-dismiss="modal">Update</button>
                                    </form>
                                </div>
                            </div>
                </div>
            </div>
            <!-- END Fade In Edit Modal -->
            <!-- Fade In Delete Modal -->
            <div class="modal fade" id="modalDelete-{{ $category->slug }}" tabindex="-1" role="dialog"
                aria-labelledby="modalDelete" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Category {{ $category->name }} </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body pb-1">
                            <p>Are you sure want to delete this category?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form action="{{ url('categories/'.$category->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Fade In Delete Modal -->
            @endforeach
            </tbody>
            {{ $categories->links() }}
            </table>
        </div>
    </div>
</div>
</div>
</div>
@endsection