@extends('adminDashboard.layouts.master')

@section('title')
    المنتجات
@stop
@section('css')


    <style>
        .product-title {
            color: #2d3748;
            font-size: 28px;
        }

        .price-section {
            border-right: 4px solid #28a745;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .info-card {
            transition: all 0.3s ease;
            background: #fff;
        }

        .info-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .icon-box {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bg-primary-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .bg-success-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .badge-danger {
            font-size: 14px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.8;
            }
        }

        .action-buttons .btn {
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .action-buttons .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .rating i {
            font-size: 18px;
        }
    </style>


@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="row row-sm">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body h-100">
                        <div class="row row-sm ">
                            <div class=" col-xl-5 col-lg-12 col-md-12">
                                <div class="preview-pic tab-content">
                                    <div class="tab-pane active" id="pic-1">
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                                            alt="{{ $product->name }}" class="img-fluid rounded shadow-sm"
                                            style="max-height: 420px; object-fit: contain;">
                                    </div>
                                </div>



                                {{-- <ul class="preview-thumbnail nav nav-tabs">
                                    <li class="active"><a data-target="#pic-1" data-toggle="tab"><img
                                                src="{{ URL::asset('assets/img/ecommerce/shirt-5.png') }}"
                                                alt="image" /></a></li>
                                    <li><a data-target="#pic-2" data-toggle="tab"><img
                                                src="{{ URL::asset('assets/img/ecommerce/shirt-2.png') }}"
                                                alt="image" /></a></li>
                                    <li><a data-target="#pic-3" data-toggle="tab"><img
                                                src="{{ URL::asset('assets/img/ecommerce/shirt-3.png') }}"
                                                alt="image" /></a></li>
                                    <li><a data-target="#pic-4" data-toggle="tab"><img
                                                src="{{ URL::asset('assets/img/ecommerce/shirt-4.png') }}"
                                                alt="image" /></a></li>
                                    <li><a data-target="#pic-5" data-toggle="tab"><img
                                                src="{{ URL::asset('assets/img/ecommerce/shirt-1.png') }}"
                                                alt="image" /></a></li>
                                </ul> --}}

                            </div>

                            <div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
                                <!-- Product Title -->
                                <div class="mb-4">
                                    <h3 class="product-title font-weight-bold text-primary mb-2">
                                        {{ $product->name }}
                                    </h3>
                                </div>

                                <!-- Price Section -->
                                <div class="price-section bg-light p-3 rounded mb-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <span class="text-muted d-block mb-1">السعر</span>
                                            <h2 class="text-success font-weight-bold mb-0">
                                                {{ number_format($product->price, 2) }}
                                                <small class="text-muted" style="font-size: 18px;">جنيه</small>
                                            </h2>
                                        </div>


                                        <div class="text-left">

                                            <form action="{{ route('products.toggle-special', $product->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                @if ($product->is_special)
                                                    <button type="submit"
                                                        class="btn btn-danger btn-sm badge-pill px-3 py-2"
                                                        style="font-size: 14px; animation: pulse 2s infinite;">
                                                        <i class="fas fa-fire"></i> منتج مميز (اضغط لإلغاء)
                                                    </button>
                                                @else
                                                    <button type="submit"
                                                        class="btn btn-outline-secondary btn-sm badge-pill px-3 py-2"
                                                        style="font-size: 14px;">
                                                        <i class="far fa-star"></i> جعله مميز
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        <br>

                                                        <!-- Description -->
                        <div class="product-description mb-4">
                            <h5 class="font-weight-bold mb-3">
                                <i class="fas fa-align-right text-primary ml-2"></i>
                                الوصف
                            </h5>
                            <p class="text-muted" style="line-height: 1.8;">
                                {{ $product->description }}
                            </p>
                        </div>

                            </div>

                        </div>


                        <hr class="my-4">

                        <!-- Product Info Cards -->
                        <div class="row mb-4">
                            <!-- Category Card -->
                            <div class="col-md-6 mb-3">
                                <div class="info-card border rounded p-3 h-100">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box bg-primary-gradient rounded-circle p-2 ml-3">
                                            <i class="fas fa-folder-open text-white" style="font-size: 20px;"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block">التصنيف</small>
                                            <h6 class="mb-0 font-weight-bold">
                                                {{ $product->category->name ?? 'غير محدد' }}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Date Card -->
                            <div class="col-md-6 mb-3">
                                <div class="info-card border rounded p-3 h-100">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box bg-success-gradient rounded-circle p-2 ml-3">
                                            <i class="fas fa-calendar-alt text-white" style="font-size: 20px;"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block">تاريخ الإضافة</small>
                                            <h6 class="mb-0 font-weight-bold">
                                                {{ $product->created_at ? $product->created_at->format('Y-m-d') : 'غير محدد' }}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="action-buttons mt-4">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="btn btn-primary btn-block btn-lg">
                                        <i class="fas fa-edit ml-2"></i>
                                        تعديل المنتج
                                    </a>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                        class="d-inline w-100"
                                        onsubmit="return confirm('هل أنت متأكد من حذف هذا المنتج؟');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-block btn-lg">
                                            <i class="fas fa-trash ml-2"></i>
                                            حذف المنتج
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary btn-block mt-2">
                                <i class="fas fa-arrow-right ml-2"></i>
                                العودة للقائمة
                            </a>
                        </div>
                    </div>




                </div>
                <!-- row closed -->
            </div>
            <!-- Container closed -->
        </div>
        <!-- main-content closed -->
    @endsection
    @section('js')
    @endsection
