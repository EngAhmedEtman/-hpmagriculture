@extends('adminDashboard.layouts.master')

@section('title')
    رسائل الاتصال
@endsection

@section('css')
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <style>
        table#messagesTable th, table#messagesTable td {
            vertical-align: middle;
            text-align: center;
            padding: 12px 8px;
        }
        table#messagesTable th {
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
            <h4 class="content-title mb-0 my-auto">رسائل الاتصال</h4>
            <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة الرسائل</span>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row row-sm">
    <div class="col-xl-12">

        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif

        <div class="card mg-b-20">
            <div class="card-header pb-3 d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-1">قائمة الرسائل</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover text-md-nowrap" id="messagesTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>الهاتف</th>
                                <th>الرسالة</th>
                                <th>الحالة</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($messages as $index => $message)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->phone }}</td>
                                    <td>{{ Str::limit($message->message, 80) }}</td>
                                    <td>
                                        @if($message->is_read)
                                            <span class="badge badge-success">مقروءة</span>
                                        @else
                                            <span class="badge badge-warning">غير مقروءة</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-primary dropdown-toggle" type="button"
                                                id="dropdownMenuButton{{ $message->id }}" data-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $message->id }}">
                                                @if(!$message->is_read)
                                                <li>
                                                    <form action="{{ route('messages.markAsRead', $message->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="dropdown-item text-info">
                                                            <i class="fas fa-check"></i> اجعل مقروء
                                                        </button>
                                                    </form>
                                                </li>
                                                @endif
                                                <li>
                                                    <form action="{{ route('messages.destroy', $message->id) }}" method="POST"
                                                        onsubmit="return confirm('هل أنت متأكد من حذف هذه الرسالة؟');">
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
                                        <i class="fas fa-envelope fa-3x text-muted mb-3"></i>
                                        <p class="text-muted mb-3">لا توجد رسائل حالياً</p>
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
        $('#messagesTable').DataTable();
    });
</script>
@endsection
