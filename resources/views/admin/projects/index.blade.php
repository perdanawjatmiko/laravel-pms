@extends('layouts.app')
@section('content')
<!-- Hero -->
<div class="bg-image" style="background-image: url('assets/media/photos/photo13@2x.jpg');">
    <div class="bg-black-50">
        <div class="content content-full">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="flex-grow-1 fs-2 text-white my-2">
                    <i class="fa fa-boxes text-white-50 me-1"></i> All Projects
                </h1>
                <a class="btn btn-primary my-2" href="{{ url('projects/create') }}">
                    <i class="fa fa-fw fa-plus opacity-50"></i>
                    <span class="d-none d-sm-inline ms-1">New Project</span>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- END Hero -->
<!-- Page Content -->
<div class="content">
    {{-- Alert  --}}
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
@elseif (session()->has('update'))
    <div class="alert alert-warning alert-dismissible d-flex align-items-center" role="alert">
        <div class="flex-shrink-0">
            <i class="fa fa-fw fa-exclamation"></i>
        </div>
        <div class="flex-grow-1 ms-3">
            <p class="mb-0">{{ session('update') }}
            </p>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
{{-- end Alert --}}
    <form action="be_pages_projects_dashboard.html" method="POST" onsubmit="return false;">
        <div class="row items-push">
            <div class="col-sm-4 col-xl-3">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fa fa-search"></i>
                    </span>
                    <input type="text" class="form-control border-start-0" id="dm-projects-search"
                        name="dm-projects-search" placeholder="Search Projects..">
                </div>
            </div>
            <div class="col-sm-4 col-xl-3 ">
                <select class="form-select" id="dm-projects-filter" name="dm-projects-filter">
                    <option value="all">All (6)</option>
                    <option value="active">Active (3)</option>
                    <option value="pending">Pending (1)</option>
                    <option value="planning">Planning (1)</option>
                    <option value="canceled">Canceled (1)</option>
                </select>
            </div>
            <div class="col-sm-4 col-xl-3">
                <button type="submit" class="btn btn-md btn-primary"><i class="fa fa-magnifying-glass"></i> Search</button>
            </div>
        </div>
    </form>
    <div class="row items-push">
        @if ($projects)
            
        @foreach ($projects as $pro)
            
        <div class="col-md-6 col-xl-4">
            <!-- Projects -->
            <div class="block block-rounded h-100 mb-0">
                <div class="block-header">
                    <div class="flex-grow-1 text-primary fs-sm fw-semibold">
                        <i class="fa fa-clock me-1"></i> {{ $pro->created_at->format('d F Y') }}
                    </div>
                    <div class="flex-grow-1 text-danger fs-sm fw-semibold">
                        <i class="fa fa-business-time me-1"></i> {{ $pro->deadline->format('d F Y') }}
                    </div>
                    <div class="block-options">
                        <div class="dropdown">
                            <button type="button" class="btn-block-option" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                {{-- <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-users me-1"></i> People
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-bell me-1"></i> Alerts
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-check-double me-1"></i> Tasks
                                </a>
                                <div role="separator" class="dropdown-divider"></div> --}}
                                <a class="dropdown-item" href="{{ url('projects/'.$pro->slug.'/edit') }}">
                                    <i class="fa fa-fw fa-pencil-alt me-1"></i> Edit Project
                                </a>
                                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalDelete-{{ $pro->slug }}">
                                    <i class="fa fa-fw fa-trash-alt me-1"></i> Delete Project
                                </button>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-content bg-body-light text-center">
                    <h3 class="fs-4 fw-bold mb-1">
                        <a href="{{ url('projects/'.$pro->slug) }}">{{ $pro->name }}</a>
                    </h3>
                    <h4 class="fs-6 text-muted mb-3">{{ $pro->category->name }}</h4>
                    <div class="push">
                        <span class="badge bg-{{ $pro->projectstatus->color }} text-uppercase fw-bold py-2 px-3">{{ $pro->projectstatus->name }}</span>
                    </div>
                </div>
                <div class="block-content text-center">
                    <a class="img-link m-1" href="javascript:void(0)">
                        <img class="img-avatar img-avatar48" src="/assets/media/avatars/avatar2.jpg" alt="">
                    </a>
                    <a class="img-link m-1" href="javascript:void(0)">
                        <img class="img-avatar img-avatar48" src="/assets/media/avatars/avatar3.jpg" alt="">
                    </a>
                    <a class="img-link m-1" href="javascript:void(0)">
                        <img class="img-avatar img-avatar48" src="/assets/media/avatars/avatar9.jpg" alt="">
                    </a>
                    <a class="img-link m-1" href="javascript:void(0)">
                        <img class="img-avatar img-avatar48" src="/assets/media/avatars/avatar10.jpg" alt="">
                    </a>
                </div>
                <div class="block-content block-content-full">
                    <div class="row g-sm">
                        <div class="col-12">
                            <a class="btn w-100 btn-alt-secondary" href="{{ url('projects/'.$pro->slug) }}">
                                <i class="fa fa-eye me-1 opacity-50"></i> View
                            </a>
                        </div>
                        {{-- <div class="col-6">
                            <a class="btn w-100 btn-alt-secondary" href="javascript:void(0)">
                                <i class="fa fa-archive me-1 opacity-50"></i> Archive
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- END Project #1 -->
        </div>
        <!-- Fade In Delete Modal -->
        <div class="modal fade" id="modalDelete-{{ $pro->slug }}" tabindex="-1" role="dialog"
            aria-labelledby="modalDelete" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Project {{ $pro->name }} </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-1">
                        <p>Are you sure want to delete <strong>{{ $pro->name }}</strong> project?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form action="{{ url('projects/'.$pro->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete Project {{ $pro->name }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Fade In Delete Modal -->
        @endforeach
        
        @else
            <h1>nodata</h1>
        @endif
    </div>
</div>
<!-- END Page Content -->
@endsection