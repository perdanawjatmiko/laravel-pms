@extends('layouts.app')
@section('content')
    <!-- Hero -->
    <div class="bg-image bg-primary-light">
        <div class="bg-black-50">
            <div class="content content-full">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="flex-grow-1 fs-2 text-white my-2">
                        {{ $project->name }} <br> <span class="fs-base fw-medium text-white-75">Web Development</span>
                    </h1>
                    <a class="btn btn-alt-primary my-2" href="{{ url('projects/'.$project->slug.'/edit') }}">
                        <i class="fa fa-fw fa-pencil-alt opacity-50"></i>
                        <span class="d-none d-sm-inline ms-1">Edit Project</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->
    <div class="row g-0 flex-md-grow-1">
        <div class="col-md-4 col-lg-5 col-xl-3 order-md-1">
            <div class="content">
                <!-- Toggle Side Content -->
                <div class="d-md-none push">
                    <!-- Class Toggle, functionality initialized in Helpers.dmToggleClass() -->
                    <button type="button" class="btn w-100 btn-hero btn-dark" data-toggle="class-toggle"
                        data-target="#side-content" data-class="d-none">
                        Project Details
                    </button>
                </div>
                <!-- END Toggle Side Content -->
    
                <!-- Side Content -->
                <div id="side-content" class="d-none d-md-block push">
                    <!-- Completion -->
                    <h2 class="h4 fw-normal mb-3">Completion</h2>
                    <div class="progress push">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="70"
                            aria-valuemin="0" aria-valuemax="100">
                            <span class="fs-sm fw-semibold">34%</span>
                        </div>
                    </div>
                    <!-- END Completion -->
    
                    <!-- About -->
                    <h2 class="h4 fw-normal my-3">Description</h2>
                    <p class="mb-2">
                        {{ $project->description }}
                    </p>
                    <h2 class="h4 fw-normal my-3">Deadline</h2>
                    <p class="text-muted">
                        {{ $project->deadline }}
                    </p>
                    <!-- END About -->
    
                    <!-- People -->
                    <h2 class="h4 fw-normal my-3">People</h2>
                    <p>
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
                        <a class="img-link m-1" href="javascript:void(0)">
                            <img class="img-avatar img-avatar48" src="/assets/media/avatars/avatar12.jpg" alt="">
                        </a>
                    </p>
                    <!-- END People -->
                </div>
                <!-- END Side Content -->
            </div>
        </div>
        <div class="col-md-8 col-lg-7 col-xl-9 order-md-0 bg-body-dark">
            <!-- Main Content -->
            <div class="content content-full">
                <!-- Tasks, custom functionality is initialized in js/pages/be_pages_projects_tasks.min.js which was auto compiled from _js/pages/be_pages_projects_tasks.js -->
                <div class="block block-rounded block-bordered">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Tasks</h3>
                        <div class="block-options">
                            <a href="#" class="btn btn-sm btn-alt-primary"><i class="fa fa-plus"></i> Add Task</a>
                        </div>
                    </div>
                    <div class="block-content">
                        <table class="table table-borderless table-striped table-vcenter table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Task</th>
                                    <th>Assigned To</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td style="width: 5%"><a href="#" class="btn btn-success btn-sm"><i class="fa fa-fw fa-check-circle"></i> </a></td>
                                        <td class="fw-semibold"><a href="#">{{ $task->name }}</a></td>
                                        <td style="width: 20%">{{ $task->user->fname.' '.$task->user->lname }}</td>
                                        <td style="width: 10%">
                                            <div class="btn-group" role="group">
                                                <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-pencil" style="color: #fff"></i> </a>
                                                <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END Tasks -->
            </div>
            <!-- END Main Content -->
        </div>
    </div>
@endsection