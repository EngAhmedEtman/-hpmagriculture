@extends('adminDashboard.layouts.master')

@section('title')
    تعديل الطلب
@endsection

@section('css')
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <style>
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .form-label {
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 8px;
        }

        .form-control:focus,
        .select2-container--default .select2-selection--single:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .required-field::after {
            content: " *";
            color: #e53e3e;
        }

        .order-item-row {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            border: 1px solid #e9ecef;
        }

        .remove-item-btn {
            margin-top: 32px;
        }

        .item-subtotal {
            font-size: 18px;
            font-weight: bold;
            color: #28a745;
        }
    </style>
@endsection

@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الطلبات</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل الطلب</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row row-sm">
        <div class="col-xl-12">

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>يوجد أخطاء في البيانات المدخلة:</strong>
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

            <div class="card">
                <div class="card-header pb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">
                            <i class="fas fa-edit text-primary ml-2"></i>
                            تعديل الطلب #{{ $order->id }}
                        </h4>
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-right ml-1"></i> العودة
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('orders.update', $order->id) }}" method="POST" id="orderForm">
                        @csrf
                        @method('PUT')

                        <!-- Customer Information -->
                        <h5 class="mb-3 text-primary">
                            <i class="fas fa-user ml-2"></i>
                            معلومات العميل
                        </h5>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="customer_name" class="form-label required-field">اسم العميل</label>
                                <input type="text" class="form-control @error('customer_name') is-invalid @enderror"
                                    id="customer_name" name="customer_name"
                                    value="{{ old('customer_name', $order->customer_name) }}" required>
                                @error('customer_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="customer_email" class="form-label">البريد الإلكتروني</label>
                                <input type="email" class="form-control @error('customer_email') is-invalid @enderror"
                                    id="customer_email" name="customer_email"
                                    value="{{ old('customer_email', $order->customer_email) }}">
                                @error('customer_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="customer_phone_one" class="form-label required-field">رقم الهاتف الأول</label>
                                <input type="text" class="form-control @error('customer_phone_one') is-invalid @enderror"
                                    id="customer_phone_one" name="customer_phone_one"
                                    value="{{ old('customer_phone_one', $order->customer_phone_one) }}" required>
                                @error('customer_phone_one')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="customer_phone_two" class="form-label">رقم الهاتف الثاني</label>
                                <input type="text" class="form-control @error('customer_phone_two') is-invalid @enderror"
                                    id="customer_phone_two" name="customer_phone_two"
                                    value="{{ old('customer_phone_two', $order->customer_phone_two) }}">
                                @error('customer_phone_two')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- Shipping Information -->
                        <h5 class="mb-3 text-primary">
                            <i class="fas fa-map-marker-alt ml-2"></i>
                            معلومات الشحن
                        </h5>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="customer_governoment" class="form-label required-field">المحافظة</label>
                                <input type="text"
                                    class="form-control @error('customer_governoment') is-invalid @enderror"
                                    id="customer_governoment" name="customer_governoment"
                                    value="{{ old('customer_governoment', $order->customer_governoment) }}" required>
                                @error('customer_governoment')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="customer_town" class="form-label required-field">المدينة</label>
                                <input type="text" class="form-control @error('customer_town') is-invalid @enderror"
                                    id="customer_town" name="customer_town"
                                    value="{{ old('customer_town', $order->customer_town) }}" required>
                                @error('customer_town')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-4">
                                <label for="customer_address" class="form-label required-field">العنوان التفصيلي</label>
                                <textarea class="form-control @error('customer_address') is-invalid @enderror" id="customer_address"
                                    name="customer_address" rows="3" required>{{ old('customer_address', $order->customer_address) }}</textarea>
                                @error('customer_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- Order Items -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0 text-primary">
                                <i class="fas fa-box ml-2"></i>
                                المنتجات
                            </h5>
                            <button type="button" class="btn btn-success" onclick="addItem()">
                                <i class="fas fa-plus ml-1"></i> إضافة منتج
                            </button>
                        </div>

                        <div id="orderItems">
                            @foreach ($order->orderItems as $index => $item)
                                <div class="order-item-row" data-item-index="{{ $index }}">
                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                            <label class="form-label required-field">المنتج</label>
                                            <select name="items[{{ $index }}][product_id]"
                                                class="form-control select2 product-select" required
                                                onchange="updatePrice({{ $index }})">
                                                <option value="">-- اختر المنتج --</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}"
                                                        data-price="{{ $product->price }}"
                                                        {{ $item->product_id == $product->id ? 'selected' : '' }}>
                                                        {{ $product->name }} - {{ number_format($product->price, 2) }}
                                                        جنيه
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-2 mb-3">
                                            <label class="form-label required-field">الكمية</label>
                                            <input type="number" name="items[{{ $index }}][quantity]"
                                                class="form-control quantity-input" value="{{ $item->quantity }}"
                                                min="1" required
                                                onchange="calculateSubtotal({{ $index }})">
                                        </div>

                                        <div class="col-md-2 mb-3">
                                            <label class="form-label required-field">السعر</label>
                                            <input type="number" name="items[{{ $index }}][price]"
                                                class="form-control price-input" value="{{ $item->price }}"
                                                step="0.01" min="0" required
                                                onchange="calculateSubtotal({{ $index }})">
                                        </div>

                                        <div class="col-md-2 mb-3">
                                            <label class="form-label">الإجمالي</label>
                                            <div class="item-subtotal" data-subtotal="{{ $index }}">
                                                {{ number_format($item->subtotal, 2) }} جنيه
                                            </div>
                                        </div>

                                        <div class="col-md-1 mb-3">
                                            <button type="button" class="btn btn-danger btn-sm remove-item-btn"
                                                onclick="removeItem(this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <hr class="my-4">

                        <!-- Order Summary -->
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="delivery_price" class="form-label required-field">سعر التوصيل</label>
                                <div class="input-group">
                                    <input type="number"
                                        class="form-control @error('delivery_price') is-invalid @enderror"
                                        id="delivery_price" name="delivery_price"
                                        value="{{ old('delivery_price', $order->delivery_price) }}" step="0.01"
                                        min="0" required onchange="calculateTotal()">
                                    <div class="input-group-append">
                                        <span class="input-group-text">جنيه</span>
                                    </div>
                                </div>
                                @error('delivery_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="status" class="form-label required-field">حالة الطلب</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status"
                                    name="status" required>
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>
                                        قيد الانتظار
                                    </option>
                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>
                                        قيد المعالجة
                                    </option>
                                    <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>
                                        تم الشحن
                                    </option>
                                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>
                                        تم التوصيل
                                    </option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                                        ملغي
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <div class="alert alert-info">
                                    <h5>ملخص الطلب:</h5>
                                    <div class="d-flex justify-content-between">
                                        <span>المجموع الفرعي:</span>
                                        <strong id="itemsTotal">0.00 جنيه</strong>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>سعر التوصيل:</span>
                                        <strong id="deliveryTotal">{{ number_format($order->delivery_price, 2) }}
                                            جنيه</strong>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <h5>الإجمالي الكلي:</h5>
                                        <h5 class="text-success" id="grandTotal">0.00 جنيه</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-success btn-lg px-5">
                                        <i class="fas fa-save ml-2"></i>
                                        حفظ التعديلات
                                    </button>
                                    <a href="{{ route('orders.show', $order->id) }}"
                                        class="btn btn-secondary btn-lg px-4">
                                        <i class="fas fa-times ml-2"></i>
                                        إلغاء
                                    </a>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script>
        let itemIndex = {{ $order->orderItems->count() }};

        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "-- اختر المنتج --"
            });

            calculateTotal();
        });

        function addItem() {
            const html = `
                <div class="order-item-row" data-item-index="${itemIndex}">
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label class="form-label required-field">المنتج</label>
                            <select name="items[${itemIndex}][product_id]"
                                    class="form-control product-select"
                                    required
                                    onchange="updatePrice(${itemIndex})">
                                <option value="">-- اختر المنتج --</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                        {{ $product->name }} - {{ number_format($product->price, 2) }} جنيه
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label required-field">الكمية</label>
                            <input type="number"
                                   name="items[${itemIndex}][quantity]"
                                   class="form-control quantity-input"
                                   value="1"
                                   min="1"
                                   required
                                   onchange="calculateSubtotal(${itemIndex})">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label required-field">السعر</label>
                            <input type="number"
                                   name="items[${itemIndex}][price]"
                                   class="form-control price-input"
                                   value="0"
                                   step="0.01"
                                   min="0"
                                   required
                                   onchange="calculateSubtotal(${itemIndex})">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label">الإجمالي</label>
                            <div class="item-subtotal" data-subtotal="${itemIndex}">0.00 جنيه</div>
                        </div>
                        <div class="col-md-1 mb-3">
                            <button type="button"
                                    class="btn btn-danger btn-sm remove-item-btn"
                                    onclick="removeItem(this)">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `;

            $('#orderItems').append(html);
            itemIndex++;
            calculateTotal();
        }

        function removeItem(button) {
            if ($('.order-item-row').length > 1) {
                $(button).closest('.order-item-row').remove();
                calculateTotal();
            } else {
                alert('يجب أن يحتوي الطلب على منتج واحد على الأقل');
            }
        }

        function updatePrice(index) {
            const row = $(`[data-item-index="${index}"]`);
            const selectedOption = row.find('.product-select option:selected');
            const price = selectedOption.data('price') || 0;

            row.find('.price-input').val(price);
            calculateSubtotal(index);
        }

        function calculateSubtotal(index) {
            const row = $(`[data-item-index="${index}"]`);
            const quantity = parseFloat(row.find('.quantity-input').val()) || 0;
            const price = parseFloat(row.find('.price-input').val()) || 0;
            const subtotal = quantity * price;

            row.find(`[data-subtotal="${index}"]`).text(subtotal.toFixed(2) + ' جنيه');
            calculateTotal();
        }

        function calculateTotal() {
            let itemsTotal = 0;

            $('.order-item-row').each(function() {
                const quantity = parseFloat($(this).find('.quantity-input').val()) || 0;
                const price = parseFloat($(this).find('.price-input').val()) || 0;
                itemsTotal += quantity * price;
            });

            const deliveryPrice = parseFloat($('#delivery_price').val()) || 0;
            const grandTotal = itemsTotal + deliveryPrice;

            $('#itemsTotal').text(itemsTotal.toFixed(2) + ' جنيه');
            $('#deliveryTotal').text(deliveryPrice.toFixed(2) + ' جنيه');
            $('#grandTotal').text(grandTotal.toFixed(2) + ' جنيه');
        }
    </script>
@endsection
