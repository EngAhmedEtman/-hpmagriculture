@extends('adminDashboard.layouts.master')

@section('title')
    الأسئلة الشائعة
@endsection

@section('css')
    <!-- DataTables CSS -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <style>
        table#faqsTable th, table#faqsTable td {
            vertical-align: middle;
            text-align: center;
            padding: 12px 8px;
        }
        table#faqsTable th {
            font-weight: 600;
            font-size: 14px;
        }
        .badge { padding: 6px 12px; font-size: 16px; font-weight: 600; }
    </style>
@endsection

@section('page-header')
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الأسئلة الشائعة</h4>
            <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة الأسئلة</span>
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

        <div class="card mg-b-20">
            <div class="card-header pb-3 d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-1">قائمة الأسئلة الشائعة</h4>
                <a class="btn btn-primary" href="{{ route('faqs.create') }}">
                    <i class="fas fa-plus ml-1"></i> إضافة سؤال جديد
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover text-md-nowrap" id="faqsTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>السؤال</th>
                                <th>الإجابة</th>
                                <th>الحالة</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($faqs as $index => $faq)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $faq->question }}</td>
                                    <td>{{ Str::limit($faq->answer, 80) }}</td>
                                    <td>
                                        @if($faq->is_active)
                                            <span class="badge badge-success">مفعل</span>
                                        @else
                                            <span class="badge badge-danger">معطل</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-primary dropdown-toggle" type="button"
                                                id="dropdownMenuButton{{ $faq->id }}" data-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $faq->id }}">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('faqs.edit', $faq->id) }}">
                                                        <i class="fas fa-edit text-success"></i> تعديل
                                                    </a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST"
                                                        onsubmit="return confirm('هل أنت متأكد من حذف هذا السؤال؟');">
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
                                    <td colspan="5" class="text-center py-5">
                                        <i class="fas fa-question-circle fa-3x text-muted mb-3"></i>
                                        <p class="text-muted mb-3">لا يوجد أسئلة حالياً</p>
                                        <a href="{{ route('faqs.create') }}" class="btn btn-primary">
                                            <i class="fas fa-plus ml-1"></i> إضافة أول سؤال
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#faqsTable').DataTable();
    });
</script>
@endsection
