@extends('layouts.app')

@section('content')


<!-- Hero -->
<div class="bg-image" style="background-image: url('assets/media/various/bg_dashboard.jpg');">
    <div class="bg-primary-dark-op">
        <div class="content content-full">
            <div class="row my-3">
                <div class="col-md-6 d-md-flex align-items-md-center">
                    <div class="py-4 py-md-0 text-center text-md-start">
                        <h1 class="fs-2 text-white mb-2">Dashboard</h1>
                        <h2 class="fs-lg fw-normal text-white-75 mb-0">Welcome to your overview</h2>
                    </div>
                </div>
                <div class="col-md-6 d-md-flex align-items-md-center">
                    <div class="row w-100 text-center">
                        <div class="col-6 col-xl-4 offset-xl-4">
                            <p class="fs-3 fw-semibold text-white mb-0">
                                860
                            </p>
                            <p class="fs-sm fw-semibold text-white-75 text-uppercase mb-0">
                                <i class="far fa-chart-bar opacity-75 me-1"></i> Sales
                            </p>
                        </div>
                        <div class="col-6 col-xl-4">
                            <p class="fs-3 fw-semibold text-white mb-0">
                                $8.960
                            </p>
                            <p class="fs-sm fw-semibold text-white-75 text-uppercase mb-0">
                                <i class="far fa-chart-bar opacity-75 me-1"></i> Earnings
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- Quick Stats -->
    <!-- jQuery Sparkline (.js-sparkline class is initialized in Helpers.jqSparkline() -->
    <!-- For more info and examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
    <div class="row items-push">
        <div class="col-6 col-lg-3">
            <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="{{ url('projects') }}">
                <div class="block-content py-5">
                    <div class="fs-3 fw-semibold text-primary mb-1">{{ $qty_project_active }}</div>
                    <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                        Active Projects
                    </p>
                </div>
            </a>
        </div>
        <div class="col-6 col-lg-3">
            <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href={{ url('projects', []) }}>
                <div class="block-content py-5">
                    <div class="fs-3 fw-semibold text-success mb-1">{{ $qty_project_complete }}</div>
                    <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                        Completed Projects
                    </p>
                </div>
            </a>
        </div>
        <div class="col-6 col-lg-3">
            <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="{{ url('tasks', []) }}">
                <div class="block-content py-5">
                    <div class="fs-3 fw-semibold mb-1">{{ $qty_task }}</div>
                    <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                        Tasks
                    </p>
                </div>
            </a>
        </div>
        <div class="col-6 col-lg-3">
            <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="{{ url('users') }}">
                <div class="block-content py-5">
                    <div class="fs-3 fw-semibold mb-1">{{ $qty_user }}</div>
                    <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                        Users
                    </p>
                </div>
            </a>
        </div>
    </div>
    <!-- END Quick Stats -->

    <!-- Users and Purchases -->
    <div class="row items-push">
        <div class="col-xl-6">
            <!-- Users -->
            <div class="block block-rounded block-mode-loading-refresh h-100 mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Users</h3>
                    {{-- <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                            data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option">
                            <i class="si si-cloud-download"></i>
                        </button>
                        <div class="dropdown">
                            <button type="button" class="btn-block-option" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="si si-wrench"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="far fa-fw fa-user me-1"></i> New Users
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="far fa-fw fa-bookmark me-1"></i> VIP Users
                                </a>
                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-pencil-alt"></i> Manage
                                </a>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-dark">
                    <form action="be_pages_dashboard.html" method="POST" onsubmit="return false;">
                        <input type="text" class="form-control form-control-alt" placeholder="Search Users..">
                    </form>
                </div>
                <div class="block-content">
                    <table class="table table-striped table-hover table-borderless table-vcenter fs-sm">
                        <thead>
                            <tr class="text-uppercase">
                                <th class="fw-bold text-center" style="width: 120px;">Avatar</th>
                                <th class="fw-bold">Name</th>
                                <th class="d-none d-sm-table-cell fw-bold">Access</th>
                                <th class="fw-bold text-center" style="width: 60px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    <img class="img-avatar img-avatar32 img-avatar-thumb"
                                        src="assets/media/avatars/avatar8.jpg" alt="">
                                </td>
                                <td>
                                    <div class="fw-semibold fs-base">Alice Moore</div>
                                    <div class="text-muted">carol@example.com</div>
                                </td>
                                <td class="d-none d-sm-table-cell fs-base">
                                    <span class="badge bg-dark">VIP</span>
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Edit User">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <img class="img-avatar img-avatar32 img-avatar-thumb"
                                        src="assets/media/avatars/avatar13.jpg" alt="">
                                </td>
                                <td>
                                    <div class="fw-semibold fs-base">Adam McCoy</div>
                                    <div class="text-muted">smith@example.com</div>
                                </td>
                                <td class="d-none d-sm-table-cell fs-base">
                                    <span class="badge bg-black-50">Pro</span>
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Edit User">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <img class="img-avatar img-avatar32 img-avatar-thumb"
                                        src="assets/media/avatars/avatar14.jpg" alt="">
                                </td>
                                <td>
                                    <div class="fw-semibold fs-base">Ryan Flores</div>
                                    <div class="text-muted">john@example.com</div>
                                </td>
                                <td class="d-none d-sm-table-cell fs-base">
                                    <span class="badge bg-dark">VIP</span>
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Edit User">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <img class="img-avatar img-avatar32 img-avatar-thumb"
                                        src="assets/media/avatars/avatar4.jpg" alt="">
                                </td>
                                <td>
                                    <div class="fw-semibold fs-base">Andrea Gardner</div>
                                    <div class="text-muted">lori@example.com</div>
                                </td>
                                <td class="d-none d-sm-table-cell fs-base">
                                    <span class="badge bg-black-50">Pro</span>
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Edit User">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <img class="img-avatar img-avatar32 img-avatar-thumb"
                                        src="assets/media/avatars/avatar12.jpg" alt="">
                                </td>
                                <td>
                                    <div class="fw-semibold fs-base">Brian Cruz</div>
                                    <div class="text-muted">jack@example.com</div>
                                </td>
                                <td class="d-none d-sm-table-cell fs-base">
                                    <span class="badge bg-success">Free</span>
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Edit User">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Users -->
        </div>
        <div class="col-xl-6">
            <!-- Purchases -->
            <div class="block block-rounded block-mode-loading-refresh h-100 mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Purchases</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                            data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option">
                            <i class="si si-cloud-download"></i>
                        </button>
                        <div class="dropdown">
                            <button type="button" class="btn-block-option" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="si si-wrench"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-sync fa-spin text-warning me-1"></i> Pending
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="far fa-fw fa-times-circle text-danger me-1"></i> Cancelled
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="far fa-fw fa-check-circle text-success me-1"></i> Completed
                                </a>
                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-eye me-1"></i> View All
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-dark">
                    <form action="be_pages_dashboard.html" method="POST" onsubmit="return false;">
                        <input type="text" class="form-control form-control-alt" placeholder="Search Purchases..">
                    </form>
                </div>
                <div class="block-content">
                    <table class="table table-striped table-hover table-borderless table-vcenter fs-sm">
                        <thead>
                            <tr class="text-uppercase">
                                <th class="fw-bold">Product</th>
                                <th class="d-none d-sm-table-cell fw-bold">Date</th>
                                <th class="fw-bold">Status</th>
                                <th class="d-none d-sm-table-cell fw-bold text-end" style="width: 120px;">Price</th>
                                <th class="fw-bold text-center" style="width: 60px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <span class="fw-semibold">iPhone X</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="fs-sm text-muted">today</span>
                                </td>
                                <td>
                                    <span class="fw-semibold text-warning">Pending..</span>
                                </td>
                                <td class="d-none d-sm-table-cell text-end">
                                    $999,99
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Manage">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-semibold">MacBook Pro 15"</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="fs-sm text-muted">today</span>
                                </td>
                                <td>
                                    <span class="fw-semibold text-warning">Pending..</span>
                                </td>
                                <td class="d-none d-sm-table-cell text-end">
                                    $2.299,00
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Manage">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-semibold">Nvidia GTX 1080 Ti</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="fs-sm text-muted">today</span>
                                </td>
                                <td>
                                    <span class="fw-semibold text-warning">Pending..</span>
                                </td>
                                <td class="d-none d-sm-table-cell text-end">
                                    $1200,00
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Manage">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-semibold">Playstation 4 Pro</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="fs-sm text-muted">today</span>
                                </td>
                                <td>
                                    <span class="fw-semibold text-danger">Cancelled</span>
                                </td>
                                <td class="d-none d-sm-table-cell text-end">
                                    $399,00
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Manage">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-semibold">Nintendo Switch</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="fs-sm text-muted">yesterday</span>
                                </td>
                                <td>
                                    <span class="fw-semibold text-success">Completed</span>
                                </td>
                                <td class="d-none d-sm-table-cell text-end">
                                    $349,00
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Manage">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-semibold">iPhone X</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="fs-sm text-muted">yesterday</span>
                                </td>
                                <td>
                                    <span class="fw-semibold text-success">Completed</span>
                                </td>
                                <td class="d-none d-sm-table-cell text-end">
                                    $999,00
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Manage">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-semibold">Echo Dot</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="fs-sm text-muted">yesterday</span>
                                </td>
                                <td>
                                    <span class="fw-semibold text-success">Completed</span>
                                </td>
                                <td class="d-none d-sm-table-cell text-end">
                                    $39,99
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Manage">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-semibold">Xbox One X</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="fs-sm text-muted">yesterday</span>
                                </td>
                                <td>
                                    <span class="fw-semibold text-success">Completed</span>
                                </td>
                                <td class="d-none d-sm-table-cell text-end">
                                    $499,00
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Manage">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Purchases -->
        </div>
    </div>
    <!-- END Users and Purchases -->
</div>
<!-- END Page Content -->
@endsection