@extends('adminDashboard.layouts.master')

@section('title')
    قائمة المستخدمين
@endsection

@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <style>
        table#example1 th,
        table#example1 td {
            vertical-align: middle;
            text-align: center;
            padding: 12px 8px;
        }

        table#example1 th {
            font-weight: 600;
            font-size: 14px;
            white-space: nowrap;
        }

        .badge {
            padding: 6px 12px;
            font-size: 16px;
            font-weight: 600;
        }

        .dropdown-menu {
            min-width: 150px;
        }

        .dropdown-item {
            padding: 8px 16px;
            font-size: 14px;
        }

        .dropdown-item i {
            width: 20px;
            margin-left: 5px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #e9ecef;
        }

        @media (max-width: 768px) {
            .table-responsive {
                font-size: 13px;
            }
        }
    </style>
@endsection

@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المستخدمين</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة المستخدمين</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row row-sm">
        <div class="col-xl-12">

            <!-- Success Message -->
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Users Card -->
            <div class="card mg-b-20">
                <div class="card-header pb-3 d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="card-title mb-1">قائمة المستخدمين</h4>
                        <p class="text-muted mb-0 small">إجمالي المستخدمين: {{ $users->count() }}</p>
                    </div>
                    @if (auth()->check() && auth()->user()->is_superadmin)
                        <li>
                            <a class="slide-item" href="{{ route('users.create') }}">
                                <i class="fas fa-user-plus ml-2"></i> إضافة مستخدم
                            </a>
                        </li>
                    @endif
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap table-hover" id="example1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>البريد الإلكتروني</th>
                                    <th>نوع المستخدم</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>



                                        <td>
                                            @if ($user->is_superadmin)
                                                <span class="badge badge-warning">مشرف رئيسي</span>
                                            @else
                                                <span class="badge badge-info">مستخدم عادي</span>
                                            @endif
                                        </td>




                                        <td>
    @php
        $currentUser = auth()->user();
    @endphp

    {{-- تحقق من السماح بعرض الدروب --}}
    @if($currentUser->is_superadmin || $currentUser->id === $user->id)
        <div class="dropdown">
            <button class="btn btn-sm btn-primary dropdown-toggle" type="button"
                id="dropdownMenuButton{{ $user->id }}" data-toggle="dropdown"
                aria-expanded="false">
                <i class="fas fa-ellipsis-v"></i>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $user->id }}">

                {{-- تعديل --}}
                @if($currentUser->is_superadmin || $currentUser->id === $user->id)
                    <li>
                        <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}">
                            <i class="fas fa-edit text-success"></i> تعديل
                        </a>
                    </li>
                @endif

                {{-- حذف فقط للمستخدمين العاديين وليس السوبر أدمن --}}
                @if($currentUser->is_superadmin && !$user->is_superadmin && $user->id !== $currentUser->id)
                    <li>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('هل أنت متأكد من حذف المستخدم: {{ $user->name }}؟');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="fas fa-trash"></i> حذف
                            </button>
                        </form>
                    </li>
                @endif

            </ul>
        </div>
    @endif
</td>




                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-5">
                                            <i class="fas fa-users fa-3x text-muted mb-3"></i>
                                            <p class="text-muted mb-3">لا يوجد مستخدمين حالياً</p>
                                            <a href="{{ route('users.create') }}" class="btn btn-primary">
                                                <i class="fas fa-plus ml-1"></i> إضافة أول مستخدم
                                            </a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End Users Card -->

        </div>
    </div>
@endsection

@section('js')
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
@endsection
