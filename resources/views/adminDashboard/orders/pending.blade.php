@extends('adminDashboard.layouts.master')

@section('title')
    الطلبات قيد الانتظار
@endsection

@section('css')
    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        .table th,
        .table td {
            vertical-align: middle;
            text-align: center;
            padding: 12px 8px;
        }

        .table th {
            font-weight: 600;
            background-color: #fff3cd;
        }

        .badge {
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 600;
        }

        .order-id {
            font-family: 'Courier New', monospace;
            font-weight: bold;
            color: #667eea;
        }

        .status-dropdown {
            min-width: 150px;
            cursor: pointer;
        }

        .pagination {
            margin-bottom: 0;
        }

        .page-item .page-link {
            border-radius: 5px;
            margin: 0 3px;
            color: #ffc107;
        }

        .page-item.active .page-link {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .pending-header {
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            color: white;
            padding: 20px;
            border-radius: 10px 10px 0 0;
            margin-bottom: 0;
        }
    </style>
@endsection

@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الطلبات</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الطلبات قيد الانتظار</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row row-sm">
        <div class="col-xl-12">

            @if (session()->has('message'))
                <div class="alert alert-{{ session('alert-type', 'info') }} alert-dismissible fade show" role="alert">
                    <strong>{{ session('message') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card">
                <div class="pending-header">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="mb-2 mb-md-0">
                            <h3 class="mb-1">
                                <i class="fas fa-clock ml-2"></i>
                                الطلبات قيد الانتظار
                            </h3>
                            <p class="mb-0">
                                إجمالي الطلبات: <strong>{{ $orders->total() }}</strong>
                            </p>
                        </div>
                        <div>
                            <span class="badge badge-light badge-lg">
                                <i class="fas fa-dollar-sign ml-1"></i>
                                {{ number_format($totalSales, 2) }} جنيه
                            </span>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>رقم الطلب</th>
                                    <th>اسم العميل</th>
                                    <th>الهاتف</th>
                                    <th>المحافظة</th>
                                    <th>المدينة</th>
                                    <th>عدد المنتجات</th>
                                    <th>الإجمالي</th>
                                    <th>تغيير الحالة</th>
                                    <th>التاريخ</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    <tr>
                                        <td>
                                            <span class="order-id">#{{ $order->id }}</span>
                                        </td>
                                        <td>
                                            <strong>{{ $order->customer_name }}</strong>
                                        </td>
                                        <td>
                                            <a href="tel:{{ $order->customer_phone_one }}" class="text-primary">
                                                <i class="fas fa-phone ml-1"></i>
                                                {{ $order->customer_phone_one }}
                                            </a>
                                        </td>
                                        <td>{{ $order->customer_governoment }}</td>
                                        <td>{{ $order->customer_town }}</td>
                                        <td>
                                            <span class="badge badge-info">
                                                {{ $order->orderItems->sum('quantity') }} منتج
                                            </span>
                                        </td>
                                        <td>
                                            <strong class="text-success">
                                                {{ number_format($order->total_price, 2) }}
                                            </strong>
                                            <small class="text-muted">جنيه</small>
                                        </td>
                                        <td>
                                            <form action="{{ route('orders.update-status', $order->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status"
                                                    class="badge badge-{{ $order->statusBadge }} border-0 status-dropdown"
                                                    onchange="if(confirm('هل تريد تغيير حالة الطلب؟')) { this.form.submit(); }">
                                                    <option value="pending" selected>قيد الانتظار</option>
                                                    <option value="processing">قيد المعالجة</option>
                                                    <option value="shipped">تم الشحن</option>
                                                    <option value="delivered">تم التوصيل</option>
                                                    <option value="cancelled">ملغي</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <small>{{ $order->created_at->format('Y-m-d') }}</small>
                                            <br>
                                            <small class="text-muted">{{ $order->created_at->diffForHumans() }}</small>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('orders.show', $order->id) }}"
                                                    class="btn btn-sm btn-info" title="عرض التفاصيل">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('orders.edit', $order->id) }}"
                                                    class="btn btn-sm btn-success" title="تعديل">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST"
                                                    class="d-inline"
                                                    onsubmit="return confirm('هل أنت متأكد من حذف الطلب #{{ $order->id }}؟');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="حذف">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center py-5">
                                            <i class="fas fa-clipboard-check fa-3x text-warning mb-3 d-block"></i>
                                            <h5 class="text-muted">لا توجد طلبات قيد الانتظار</h5>
                                            <p class="text-muted">جميع الطلبات تم معالجتها ✨</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if ($orders->hasPages())
                        <div class="row mt-4">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <div class="pagination-info text-muted">
                                    عرض {{ $orders->firstItem() }} إلى {{ $orders->lastItem() }}
                                    من أصل {{ $orders->total() }} طلب
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex justify-content-md-end">
                                    {{ $orders->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
@endsection

