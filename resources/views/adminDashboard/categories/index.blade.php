@extends('adminDashboard.layouts.master')

@section('title')
    التصنيفات
@endsection

@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

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

        .product-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
        }

        .product-image:hover {
            transform: scale(1.5);
            cursor: pointer;
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

        .no-image-placeholder {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f9fa;
            border-radius: 8px;
            color: #6c757d;
        }

        /* تحسين شكل الجدول على الموبايل */
        @media (max-width: 768px) {
            .table-responsive {
                font-size: 13px;
            }

            .product-image,
            .no-image-placeholder {
                width: 50px;
                height: 50px;
            }
        }
    </style>
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المنتجات</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ عرض المنتجات</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">

            <!-- Success Message -->
            @if (session()->has('message'))
                <div class="alert alert-{{ session('alert-type', 'info') }} alert-dismissible fade show" role="alert">
                    <strong>{{ session('message') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>يوجد أخطاء:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Products Card -->
            <div class="card mg-b-20">
                <div class="card-header pb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="card-title mb-1">قائمة التصنيفات</h4>
                            <p class="text-muted mb-0 small">إجمالي التصنيفات: {{ $categories->count() }}</p>
                        </div>
                        <a class="btn btn-primary" href="{{ route('categories.create') }}">
                            <i class="fas fa-plus ml-1"></i> إضافة تصنيف جديد
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
<table class="table text-md-nowrap table-hover" id="example1">
    <thead>
        <tr>
            <th class="border-bottom-0">#</th>
            <th class="border-bottom-0">الاسم</th>
            <th class="border-bottom-0">الوصف</th>
            <th class="border-bottom-0">عدد المنتجات</th>
            <th class="border-bottom-0">الحالة</th>
            <th class="border-bottom-0">العمليات</th>
        </tr>
     </thead>
                        <tbody>
                            @forelse ($categories as $index => $category)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><strong style="font-size:16px">{{ $category->name }}</strong></td>
                                    <td>{{ Str::limit($category->description, 50) ?? 'لا يوجد وصف' }}</td>
                                    <td>
                                        <span class="badge badge-info px-3 py-2">{{ $category->products->count() }} منتج</span>
                                    </td>
                                    <td>
                                        @if($category->is_active)
                                            <span class="badge badge-success px-3 py-2"><i class="fas fa-check-circle"></i> مفعل</span>
                                        @else
                                            <span class="badge badge-danger px-3 py-2"><i class="fas fa-times-circle"></i> معطل</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-primary dropdown-toggle" type="button"
                                                id="dropdownMenuButton{{ $category->id }}" data-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $category->id }}">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('categories.edit', $category->id) }}">
                                                        <i class="fas fa-edit text-success"></i> تعديل
                                                    </a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline"
                                                        onsubmit="return confirm('هل أنت متأكد من حذف التصنيف: {{ $category->name }}؟');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger">
                                                            <i class="fas fa-trash"></i> حذف
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <i class="fas fa-folder-open fa-3x text-muted mb-3"></i>
                                        <p class="text-muted mb-3">لا توجد تصنيفات حالياً</p>
                                        <a href="{{ route('categories.create') }}" class="btn btn-primary">
                                            <i class="fas fa-plus ml-1"></i> إضافة أول تصنيف
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
</table>

                    </div>
                </div>
            </div>
            <!-- End Products Card -->

        </div>
    </div>
    <!-- row closed -->
@endsection

@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
@endsection
