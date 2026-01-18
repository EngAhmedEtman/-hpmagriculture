@extends('adminDashboard.layouts.master')

@section('title')
    لوحة التحكم
@endsection

@section('css')
    <style>
        .stats-card {
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .stats-card:hover {
            transform: translateY(-5px);
        }

        .stats-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .growth-badge {
            font-size: 12px;
            padding: 4px 8px;
            border-radius: 12px;
        }

        .order-status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }
    </style>
@endsection

@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">مرحباً بك! 👋</h2>
                <p class="mg-b-0">نظرة عامة على أداء المتجر</p>
            </div>
        </div>
        <div class="main-dashboard-header-right">
            <div>
                <label class="tx-13">إجمالي المبيعات</label>
                <h5>{{ number_format($totalSales, 2) }} جنيه</h5>
            </div>
            <div>
                <label class="tx-13">إجمالي الطلبات</label>
                <h5>{{ $totalOrders }}</h5>
            </div>
            <div>
                <label class="tx-13">المنتجات النشطة</label>
                <h5>{{ $activeProducts }}</h5>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Statistics Cards Row -->
    <div class="row row-sm">
        <!-- Today Sales -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card stats-card bg-primary-gradient text-white overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon bg-white text-primary ml-3">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1 tx-12 text-white">مبيعات اليوم</h6>
                            <h3 class="mb-0 tx-22 font-weight-bold text-white">
                                {{ number_format($todaySales, 2) }}
                            </h3>
                            <small class="text-white-50">جنيه</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Orders -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card stats-card bg-success-gradient text-white overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon bg-white text-success ml-3">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1 tx-12 text-white">إجمالي الطلبات</h6>
                            <h3 class="mb-0 tx-22 font-weight-bold text-white">{{ $totalOrders }}</h3>
                            <small class="text-white-50">طلب</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Products -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card stats-card bg-warning-gradient text-white overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon bg-white text-warning ml-3">
                            <i class="fas fa-box"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1 tx-12 text-white">المنتجات</h6>
                            <h3 class="mb-0 tx-22 font-weight-bold text-white">{{ $totalProducts }}</h3>
                            <small class="text-white-50">منتج ({{ $activeProducts }} نشط)</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Monthly Sales -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card stats-card bg-info-gradient text-white overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon bg-white text-info ml-3">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1 tx-12 text-white">مبيعات الشهر</h6>
                            <h3 class="mb-0 tx-22 font-weight-bold text-white">
                                {{ number_format($thisMonthSales, 2) }}
                            </h3>
                            @if($salesGrowth > 0)
                                <small class="text-white-50">
                                    <i class="fas fa-arrow-up"></i> +{{ number_format($salesGrowth, 1) }}%
                                </small>
                            @elseif($salesGrowth < 0)
                                <small class="text-white-50">
                                    <i class="fas fa-arrow-down"></i> {{ number_format($salesGrowth, 1) }}%
                                </small>
                            @else
                                <small class="text-white-50">لا يوجد تغيير</small>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Orders Status Row -->
    <div class="row row-sm mt-3">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-3">
                    <h4 class="card-title mb-0">
                        <i class="fas fa-chart-pie text-primary ml-2"></i>
                        حالة الطلبات
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-2 col-6 mb-3">
                            <a href="{{ route('orders.pending') }}" class="text-decoration-none">
                                <div class="p-3 border rounded">
                                    <h3 class="text-warning mb-2">{{ $pendingOrders }}</h3>
                                    <p class="mb-0 text-muted">قيد الانتظار</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2 col-6 mb-3">
                            <a href="{{ route('orders.processing') }}" class="text-decoration-none">
                                <div class="p-3 border rounded">
                                    <h3 class="text-info mb-2">{{ $processingOrders }}</h3>
                                    <p class="mb-0 text-muted">قيد المعالجة</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2 col-6 mb-3">
                            <a href="{{ route('orders.shipped') }}" class="text-decoration-none">
                                <div class="p-3 border rounded">
                                    <h3 class="text-primary mb-2">{{ $shippedOrders }}</h3>
                                    <p class="mb-0 text-muted">تم الشحن</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2 col-6 mb-3">
                            <a href="{{ route('orders.delivered') }}" class="text-decoration-none">
                                <div class="p-3 border rounded">
                                    <h3 class="text-success mb-2">{{ $deliveredOrders }}</h3>
                                    <p class="mb-0 text-muted">تم التوصيل</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2 col-6 mb-3">
                            <a href="{{ route('orders.cancelled') }}" class="text-decoration-none">
                                <div class="p-3 border rounded">
                                    <h3 class="text-danger mb-2">{{ $cancelledOrders }}</h3>
                                    <p class="mb-0 text-muted">ملغية</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2 col-6 mb-3">
                            <a href="{{ route('orders.index') }}" class="text-decoration-none">
                                <div class="p-3 border rounded bg-light">
                                    <h3 class="text-dark mb-2">{{ $totalOrders }}</h3>
                                    <p class="mb-0 text-muted"><strong>الإجمالي</strong></p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders & Top Products -->
    <div class="row row-sm mt-3">
        <!-- Recent Orders -->
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header pb-3 d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">
                        <i class="fas fa-clock text-primary ml-2"></i>
                        أحدث الطلبات
                    </h4>
                    <a href="{{ route('orders.index') }}" class="btn btn-sm btn-primary">
                        عرض الكل
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>رقم الطلب</th>
                                    <th>العميل</th>
                                    <th>المنتجات</th>
                                    <th>الإجمالي</th>
                                    <th>الحالة</th>
                                    <th>التاريخ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentOrders as $order)
                                    <tr>
                                        <td>
                                            <a href="{{ route('orders.show', $order->id) }}"
                                               class="font-weight-bold text-primary">
                                                #{{ $order->id }}
                                            </a>
                                        </td>
                                        <td>{{ $order->customer_name }}</td>
                                        <td>
                                            <span class="badge badge-info">
                                                {{ $order->orderItems->sum('quantity') }}
                                            </span>
                                        </td>
                                        <td>
                                            <strong>{{ number_format($order->total_price, 2) }}</strong>
                                            <small class="text-muted">جنيه</small>
                                        </td>
                                        <td>
                                            <span class="badge badge-{{ $order->statusBadge }} order-status-badge">
                                                {{ $order->statusName }}
                                            </span>
                                        </td>
                                        <td>
                                            <small>{{ $order->created_at->diffForHumans() }}</small>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">
                                            لا توجد طلبات حالياً
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Products -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header pb-3">
                    <h4 class="card-title mb-0">
                        <i class="fas fa-star text-warning ml-2"></i>
                        أكثر المنتجات مبيعاً
                    </h4>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        @forelse($topProducts as $product)
                            <div class="list-group-item border-0 px-0">
                                <div class="d-flex align-items-center">
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}"
                                             alt="{{ $product->name }}"
                                             class="rounded ml-3"
                                             style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded ml-3 d-flex align-items-center justify-content-center"
                                             style="width: 50px; height: 50px;">
                                            <i class="fas fa-image text-muted"></i>
                                        </div>
                                    @endif
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">{{ Str::limit($product->name, 30) }}</h6>
                                        <small class="text-muted">
                                            <i class="fas fa-shopping-cart ml-1"></i>
                                            {{ $product->total_sold ?? 0 }} مبيعات
                                        </small>
                                    </div>
                                    <div>
                                        <strong class="text-success">
                                            {{ number_format($product->price, 2) }}
                                        </strong>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-muted py-4">لا توجد مبيعات بعد</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <!-- Top Governments -->
    <div class="row row-sm mt-3">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-3">
                    <h4 class="card-title mb-0">
                        <i class="fas fa-map-marker-alt text-danger ml-2"></i>
                        أكثر المحافظات طلباً
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse($topGovernments as $gov)
                            <div class="col-md-2 col-6 mb-3">
                                <div class="text-center p-3 border rounded">
                                    <h4 class="text-primary mb-2">{{ $gov->total }}</h4>
                                    <p class="mb-0 text-muted small">{{ $gov->customer_government }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center text-muted py-4">
                                لا توجد بيانات متاحة
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    
@endsection

@section('js')
@endsection
