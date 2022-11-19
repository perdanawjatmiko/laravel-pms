@extends('layouts.app')
@section('content')
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Tasks</h1>
            <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Tasks</li>
                    <li class="breadcrumb-item active" aria-current="page">All Task</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">All Task</h3>
            <div class="block-options">
                <div class="block-options-item">
                    <button class="btn btn-sm btn-alt-primary" data-bs-toggle="modal" data-bs-target="#modalCreate"><i class="fa fa-plus"></i> Add Task</button>
                </div>
            </div>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter table-responsive">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th>Task Name</th>
                            <th>Due Date</th>
                            <th>Project</th>
                            <th>Asigned to</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $t)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td> <a href="#">{{ $t->name }}</a></td>
                            <td>{{ $t->due_date->format('d-M-Y') }}</td>
                            <td>{{ $t->project->name }}</td>
                            <td>{{ $t->user->fname.' '.$t->user->lname }}</td>
                            <td>{{ $t->taskstatus->name }}</td>
                            <td class="">
                                @if ($t->status != 1)
                                    
                                    <a href="{{ url('tasks/'.$t->slug.'/setComplete') }}">
                                        <button type="button" class="btn btn-sm btn-success js-bs-tooltip-enabled">
                                            <i class="si si-check"></i>
                                        </button>
                                    </a>
                                @endif
                                <a href="#">                               
                                    <button type="button" class="btn btn-sm btn-warning js-bs-tooltip-enabled" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit-{{ $t->slug }}">
                                        <i class="fa fa-pencil-alt" style="color: white"></i>
                                    </button>
                                </a>
                                <button type="button" class="btn btn-sm btn-danger js-bs-tooltip-enabled" data-bs-toggle="modal" data-bs-target="#modalDelete-{{ $t->slug }}">
                                <i class="fa fa-trash" style="color: white"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Edit Modal -->
                            <div class="modal fade" id="modalEdit-{{ $t->slug }}" tabindex="-1" role="dialog" aria-labelledby="modalEdit-"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Task {{ $t->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body pb-1">
                                            <form action="{{ url('tasks/'.$t->slug) }}" method="POST" enctype="multipart/form-data">
                                                @method('PATCH')
                                                @csrf
                                                <div class="row push">
                                                    <div class="mb-2">
                                                        <label for="name" class="form-label">Task Name</label>
                                                        <input type="text" class="form-control" name="name" id="name" placeholder="Task Name" value="{{ $t->name }}">
                                                    </div>
                                                </div>
                                                <div class="row push">
                                                    <div class="mb-2">
                                                        <label for="slug" class="form-label">Task Slug</label>
                                                        <input type="text" class="form-control" name="slug" id="slug" placeholder="Task Name" value="{{ $t->slug }}">
                                                    </div>
                                                </div>
                                                <div class="row push">
                                                    <div class="mb-2">
                                                        <label for="project_id" class="form-label">Project</label>
                                                        <select name="project_id" id="project_id" class="form-select form-control">
                                                            {{-- <option value="">--Select Project--</option> --}}
                                                            @foreach ($projects as $p)
                                                            @if ($p->id == $t->project_id)
                                                                
                                                            <option value="{{ $p->id }}" selected>{{ $p->name }}</option>
                                                            @else
                                                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                                                                
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row push">
                                                    <div class="mb-2">
                                                        <label for="user_id" class="form-label">Project</label>
                                                        <select name="user_id" id="user_id" class="form-select form-control">
                                                            {{-- <option value="">--Select Project--</option> --}}
                                                            @foreach ($users as $user)
                                                            @if ($user->id == $t->user_id)
                                                                
                                                            <option value="{{ $user->id }}" selected>{{ $user->fname.' '.$user->lname }}</option>
                                                            @else
                                                            <option value="{{ $user->id }}">{{ $user->fname.' '.$user->lname }}</option>
                                                                
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row push">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="due_date">Due Date</label>
                                                        <input type="text" class="js-datepicker form-control @error('due_date') is-invalid @enderror" id="due_date"
                                                            name="due_date" data-week-start="1" data-autoclose="true"
                                                            data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD" value="{{ $t->due_date }}">
                                                    </div>
                                                </div>
                                                <div class="row push">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="description">Description</label>
                                                        <textarea name="description" id="description" cols="20" rows="5" class="form-control">{{ $t->description }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-alt-success" data-bs-dismiss="modal"><i class="fa fa-fw fa-check"></i> Edit Task</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- END Edit Modal -->
                            <!-- Delete Modal -->
                            <div class="modal fade" id="modalDelete-{{ $t->slug }}" tabindex="-1" role="dialog" aria-labelledby="modalDelete-{{ $t->slug }}"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete Task </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body pb-1">
                                            <p>Are you sure want to delete this task? <strong>( {{ $t->name }} )</strong></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ url('tasks/'.$t->slug) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Delete Task</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Delete Modal -->
                            @endforeach
                        </tbody>
                            <!-- Create Modal -->
                            <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="modalCreate"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Create Task</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body pb-1">
                                            <form action="{{ url('tasks') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row push">
                                                    <div class="mb-2">
                                                        <label for="name" class="form-label">Task Name</label>
                                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Task Name" value="{{ old('name') }}">
                                                        @error('name')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row push">
                                                    <div class="mb-2">
                                                        <label for="project_id" class="form-label">Project</label>
                                                        <select name="project_id" id="project_id" class="form-select form-control">
                                                            <option value="">--Select Project--</option>
                                                            @foreach ($projects as $pro)
                                                                <option value="{{ $pro->id }}">{{ $pro->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('project_id')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row push">
                                                    <div class="mb-2">
                                                        <label for="user_id" class="form-label">Asignee to</label>
                                                        <select name="user_id" id="user_id" class="form-select form-control">
                                                            <option value="">--Select User--</option>
                                                            @foreach ($users as $user)
                                                                <option value="{{ $user->id }}">{{ $user->fname.' '.$user->lname }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row push">
                                                    <div class="mb-2">
                                                        <label for="status" class="form-label">Status</label>
                                                        <select name="status" id="status" class="form-select form-control">
                                                            <option value="">--Select Status--</option>
                                                            @foreach ($status as $status)
                                                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row push">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="due_date">Due Date</label>
                                                        <input type="text" class="js-datepicker form-control @error('due_date') is-invalid @enderror" id="due_date"
                                                            name="due_date" data-week-start="1" data-autoclose="true"
                                                            data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD">
                                                    </div>
                                                </div>
                                                <div class="row push">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="description">Description</label>
                                                        <textarea name="description" id="description" cols="20" rows="5" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-alt-success" data-bs-dismiss="modal"><i class="fa fa-fw fa-check"></i> Add Task</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- END Create Modal -->
                </table>
            </div>
        </div>
    </div>
</div>
@endsection