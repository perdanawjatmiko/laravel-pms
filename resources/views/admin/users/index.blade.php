@extends('layouts.app')
@section('content')
{{-- Hero --}}
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Users</h1>
            <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active" aria-current="page">All user</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
{{-- end Hero --}}
<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">All User</h3>
            <div class="block-options">
                <div class="block-options-item">
                    <a href="{{ url('/users/create') }}" class="btn btn-alt-success"><i class="fa fa-plus"></i> Add User</a>
                </div>
            </div>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th class="text-center" style="width: 10%"><i class="far fa-user"></i></th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $u)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-center">
                                @if ($u->avatar)
                                    <img class="img-avatar img-avatar48" src="{{ asset('storage/'.$u->avatar) }}" alt="">
                                @else
                                    <img class="img-avatar img-avatar48" src="{{ asset('/assets/media/avatars/avatar10.jpg') }}" alt="">
                                @endif
                            </td>
                            <td> <a href="{{ url('users/'.$u->username) }}"> {{ $u->fname." ".$u->lname }}</a></td>
                            <td>{{ $u->email }}</td>
                            <td>
                                @if ($u->role_id == 1)
                                    <span class="badge bg-primary">{{ $u->role->name}}</span>
                                @elseif ($u->role_id == 2)
                                    <span class="badge bg-success">{{ $u->role->name}}</span>
                                @else
                                    <span class="badge bg-warning">{{ $u->role->name}}</span>
                                @endif
                            </td>
                            <td class="">
                                <a href="{{ url('users/'.$u->username.'/edit') }}">                               
                                    <button type="button" class="btn btn-sm btn-warning js-bs-tooltip-enabled" data-bs-toggle="tooltip"
                                        aria-label="Edit">
                                        <i class="fa fa-pencil-alt" style="color: white"></i>
                                    </button>
                                </a>
                                <button type="button" class="btn btn-sm btn-danger js-bs-tooltip-enabled" data-bs-toggle="modal" data-bs-target="#modalDelete-{{ $u->username }}">
                                <i class="fa fa-trash" style="color: white"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Fade In Default Modal -->
                            <div class="modal fade" id="modalDelete-{{ $u->username }}" tabindex="-1" role="dialog" aria-labelledby="modalDelete-{{ $u->username }}"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete User {{ $u->fname." ".$u->lname }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body pb-1">
                                            <p>Are you sure want to delete <strong>{{ $u->fname." ".$u->lname }}</strong> user?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ url('users/'.$u->username) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Delete {{ $u->fname." ".$u->lname }} User</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Fade In Default Modal -->
                            @endforeach
                        </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection