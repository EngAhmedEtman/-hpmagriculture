@extends('adminDashboard.layouts.master')

@section('title')
    المنتجات
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
                            <h4 class="card-title mb-1">قائمة المنتجات</h4>
                            <p class="text-muted mb-0 small">إجمالي المنتجات: {{ $products->count() }}</p>
                        </div>
                        <a class="btn btn-primary" href="{{ route('products.create') }}">
                            <i class="fas fa-plus ml-1"></i> إضافة منتج جديد
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
<table class="table text-md-nowrap table-hover" id="example1">
    <thead>
        <tr>
            <th class="border-bottom-0">#</th>
            <th class="border-bottom-0">الصورة</th>
            <th class="border-bottom-0">الاسم</th>
            <th class="border-bottom-0">السعر</th>
            <th class="border-bottom-0">التصنيف</th>
            <th class="border-bottom-0">الوصف</th>
            <th class="border-bottom-0">الحالة</th>
            <th class="border-bottom-0">مميز</th>
            <th class="border-bottom-0">العمليات</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($products as $index => $product)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    @if ($product->image)
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                            class="product-image" title="{{ $product->name }}"
                            style="max-width: 80px; max-height: 80px; object-fit: cover; border-radius: 5px;">
                    @else
                        <div class="no-image-placeholder" style="font-size: 24px; color: #ccc;">
                            <i class="fas fa-image"></i>
                        </div>
                    @endif
                </td>
                <td>
                    <strong style="font-size: 16px;">{{ Str::limit($product->name, 30) }}</strong>
                </td>
                <td>
                    <span class="text-success font-weight-bold" style="font-size: 16px;">
                        {{ number_format($product->price, 0) }}
                    </span>
                    <small class="text-muted" style="font-size: 14px;">جنيه</small>
                </td>
                <td>
                    <span class="badge badge-primary px-3 py-2" style="font-size: 16px; font-weight: 600;">
                        {{ $product->category->name ?? 'غير محدد' }}
                    </span>
                </td>
                <td>
                    <span title="{{ $product->description }}" style="font-size: 15px;">
                        {{ Str::limit($product->description, 40) }}
                    </span>
                </td>
                <td>
                    @if ($product->is_active)
                        <span class="badge badge-success px-3 py-2" style="font-size: 16px; font-weight: 600;">
                            <i class="fas fa-check-circle"></i> مفعل
                        </span>
                    @else
                        <span class="badge badge-danger px-3 py-2" style="font-size: 16px; font-weight: 600;">
                            <i class="fas fa-times-circle"></i> معطل
                        </span>
                    @endif
                </td>
                <td>
                    @if ($product->is_special)
                        <span class="badge badge-warning px-3 py-2" style="font-size: 16px; font-weight: 600;">
                            <i class="fas fa-star"></i> مميز
                        </span>
                    @else
                        <span class="badge badge-secondary px-3 py-2" style="font-size: 16px; font-weight: 600;">
                            <i class="far fa-star"></i> عادي
                        </span>
                    @endif
                </td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button"
                            id="dropdownMenuButton{{ $product->id }}" data-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu"
                            aria-labelledby="dropdownMenuButton{{ $product->id }}">
                            <li>
                                <a class="dropdown-item" href="{{ route('products.show', $product->id) }}">
                                    <i class="fas fa-eye text-info"></i> عرض التفاصيل
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('products.edit', $product->id) }}">
                                    <i class="fas fa-edit text-success"></i> تعديل
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('هل أنت متأكد من حذف المنتج: {{ $product->name }}؟\n\nهذا الإجراء لا يمكن التراجع عنه!');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fas fa-trash"></i> حذف نهائياً
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center py-5">
                    <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                    <p class="text-muted mb-3">لا توجد منتجات حالياً</p>
                    <a href="{{ route('products.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus ml-1"></i> إضافة أول منتج
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
