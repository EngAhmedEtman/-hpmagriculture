<!-- ============================================ -->
<!-- 2. orders/delivered.blade.php -->
<!-- ============================================ -->
@extends('adminDashboard.layouts.master')

@section('title')
    الطلبات المكتملة
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
            background-color: #d4edda;
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

        .pagination {
            margin-bottom: 0;
        }

        .page-item .page-link {
            border-radius: 5px;
            margin: 0 3px;
            color: #28a745;
        }

        .page-item.active .page-link {
            background-color: #28a745;
            border-color: #28a745;
        }

        .delivered-header {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
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
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الطلبات المكتملة</span>
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
                <div class="delivered-header">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="mb-2 mb-md-0">
                            <h3 class="mb-1">
                                <i class="fas fa-check-circle ml-2"></i>
                                الطلبات المكتملة
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
                                    <th>تاريخ التوصيل</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1 @endphp
                                @forelse ($orders as $order)
                                    <tr>
                                        <td>
                                            <span class="order-id">{{ $i++ }}</span>
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
                                            <small>{{ $order->updated_at->format('Y-m-d') }}</small>
                                            <br>
                                            <small class="text-muted">{{ $order->updated_at->diffForHumans() }}</small>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('orders.show', $order->id) }}"
                                                    class="btn btn-sm btn-info" title="عرض التفاصيل">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <button onclick="window.print()" class="btn btn-sm btn-secondary"
                                                    title="طباعة">
                                                    <i class="fas fa-print"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center py-5">
                                            <i class="fas fa-box-open fa-3x text-success mb-3 d-block"></i>
                                            <h5 class="text-muted">لا توجد طلبات مكتملة بعد</h5>
                                            <p class="text-muted">ستظهر الطلبات المكتملة هنا</p>
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
