@extends('adminDashboard.layouts.master')

@section('title')
    تفاصيل الطلب
@endsection

@section('css')
    <style>
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .order-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 15px 15px 0 0;
        }

        .order-id {
            font-size: 32px;
            font-weight: bold;
        }

        .info-box {
            background: #f8f9fa;
            border-right: 4px solid #667eea;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .info-box h6 {
            color: #667eea;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .product-item {
            border-bottom: 1px solid #e9ecef;
            padding: 15px 0;
        }

        .product-item:last-child {
            border-bottom: none;
        }

        .total-section {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .badge-lg {
            padding: 10px 20px;
            font-size: 16px;
        }
    </style>
@endsection

@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الطلبات</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تفاصيل الطلب</span>
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
                <!-- Order Header -->
                <div class="order-header">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="mb-2">
                                <i class="fas fa-receipt ml-2"></i>
                                الطلب #{{ $order->id }}
                            </h2>
                            <p class="mb-0">تاريخ الطلب: {{ $order->created_at->format('Y-m-d H:i') }}</p>
                        </div>
                        <div class="col-md-6 text-md-left">
                            <span class="badge badge-{{ $order->statusBadge }} badge-lg">
                                {{ $order->statusName }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <!-- Customer Information -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="info-box">
                                <h6>
                                    <i class="fas fa-user ml-2"></i>
                                    معلومات العميل
                                </h6>
                                <table class="table table-borderless mb-0">
                                    <tr>
                                        <td><strong>الاسم:</strong></td>
                                        <td>{{ $order->customer_name }}</td>
                                    </tr>
                                    @if($order->customer_email)
                                    <tr>
                                        <td><strong>البريد الإلكتروني:</strong></td>
                                        <td>
                                            <a href="mailto:{{ $order->customer_email }}">
                                                {{ $order->customer_email }}
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td><strong>الهاتف الأول:</strong></td>
                                        <td>
                                            <a href="tel:{{ $order->customer_phone_one }}" class="text-primary">
                                                {{ $order->customer_phone_one }}
                                            </a>
                                        </td>
                                    </tr>
                                    @if($order->customer_phone_two)
                                    <tr>
                                        <td><strong>الهاتف الثاني:</strong></td>
                                        <td>
                                            <a href="tel:{{ $order->customer_phone_two }}" class="text-primary">
                                                {{ $order->customer_phone_two }}
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                </table>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-box">
                                <h6>
                                    <i class="fas fa-map-marker-alt ml-2"></i>
                                    عنوان التوصيل
                                </h6>
                                <table class="table table-borderless mb-0">
                                    <tr>
                                        <td><strong>المحافظة:</strong></td>
                                        <td>{{ $order->customer_governoment }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>المدينة:</strong></td>
                                        <td>{{ $order->customer_town }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>العنوان التفصيلي:</strong></td>
                                        <td>{{ $order->customer_address }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Order Items -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h5 class="font-weight-bold mb-3">
                                <i class="fas fa-box ml-2 text-primary"></i>
                                المنتجات المطلوبة
                            </h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="bg-light">
                                        <tr>
                                            <th width="5%">#</th>
                                            <th>المنتج</th>
                                            <th width="15%">السعر</th>
                                            <th width="10%">الكمية</th>
                                            <th width="15%">الإجمالي</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->orderItems as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    <strong>{{ $item->product->name ?? 'منتج محذوف' }}</strong>
                                                    @if($item->product)
                                                        <br>
                                                        <small class="text-muted">
                                                            التصنيف: {{ $item->product->category->name ?? 'غير محدد' }}
                                                        </small>
                                                    @endif
                                                </td>
                                                <td>{{ number_format($item->price, 2) }} جنيه</td>
                                                <td>
                                                    <span class="badge badge-primary">{{ $item->quantity }}</span>
                                                </td>
                                                <td>
                                                    <strong class="text-success">
                                                        {{ number_format($item->subtotal, 2) }} جنيه
                                                    </strong>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Price Summary -->
                    <div class="row">
                        <div class="col-md-6 ml-auto">
                            <div class="total-section">
                                <table class="table table-borderless mb-0">
                                    <tr>
                                        <td><strong>المجموع الفرعي:</strong></td>
                                        <td class="text-left">
                                            <strong>
                                                {{ number_format($order->orderItems->sum('subtotal'), 2) }} جنيه
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>سعر التوصيل:</strong></td>
                                        <td class="text-left">
                                            <strong>{{ number_format($order->delivery_price, 2) }} جنيه</strong>
                                        </td>
                                    </tr>
                                    <tr class="border-top">
                                        <td><h5 class="mb-0"><strong>الإجمالي الكلي:</strong></h5></td>
                                        <td class="text-left">
                                            <h4 class="mb-0 text-success">
                                                <strong>{{ number_format($order->total_price, 2) }} جنيه</strong>
                                            </h4>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- Action Buttons -->
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between flex-wrap">
                                <div>
                                    <a href="{{ route('orders.edit', $order->id) }}"
                                       class="btn btn-primary btn-lg mb-2">
                                        <i class="fas fa-edit ml-2"></i>
                                        تعديل الطلب
                                    </a>
                                    <button onclick="window.print()" class="btn btn-info btn-lg mb-2">
                                        <i class="fas fa-print ml-2"></i>
                                        طباعة الطلب
                                    </button>
                                </div>
                                <div>
                                    <form action="{{ route('orders.destroy', $order->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('هل أنت متأكد من حذف هذا الطلب؟\n\nسيتم حذف جميع المنتجات المرتبطة.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-lg mb-2">
                                            <i class="fas fa-trash ml-2"></i>
                                            حذف الطلب
                                        </button>
                                    </form>
                                    <a href="{{ route('orders.index') }}" class="btn btn-secondary btn-lg mb-2">
                                        <i class="fas fa-arrow-right ml-2"></i>
                                        العودة للقائمة
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
@endsection
