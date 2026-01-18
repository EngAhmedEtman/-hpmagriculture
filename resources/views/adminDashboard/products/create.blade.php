@extends('adminDashboard.layouts.master')

@section('title')
    إضافة منتج جديد
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

        .image-preview {
            width: 100%;
            height: 200px;
            border: 2px dashed #e2e8f0;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f7fafc;
            cursor: pointer;
            transition: all 0.3s ease;
            overflow: hidden;
            position: relative;
        }

        .image-preview:hover {
            border-color: #667eea;
            background: #edf2f7;
        }

        .image-preview img {
            max-width: 100%;
            max-height: 100%;
            display: none;
            object-fit: cover;
        }

        .image-preview.has-image img {
            display: block;
        }

        .image-preview .placeholder {
            text-align: center;
            color: #a0aec0;
        }

        .image-preview.has-image .placeholder {
            display: none;
        }

        .custom-switch-lg .custom-control-label {
            padding-left: 2.5rem;
            padding-top: 0.25rem;
        }

        .custom-switch-lg .custom-control-label::before {
            height: 1.5rem;
            width: 2.75rem;
            border-radius: 3rem;
        }

        .custom-switch-lg .custom-control-label::after {
            width: 1.25rem;
            height: 1.25rem;
            border-radius: 50%;
        }

        .custom-switch-lg .custom-control-input:checked~.custom-control-label::after {
            transform: translateX(1.25rem);
        }

        .required-field::after {
            content: " *";
            color: #e53e3e;
        }
    </style>
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المنتجات</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إضافة منتج جديد</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">

            <!-- Error Messages -->
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
                            <i class="fas fa-plus-circle text-primary ml-2"></i>
                            إضافة منتج جديد
                        </h4>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-right ml-1"></i> العودة
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <!-- Product Name -->
                            <div class="col-md-6 mb-4">
                                <label for="name" class="form-label required-field">اسم المنتج</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}" placeholder="أدخل اسم المنتج"
                                    required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Price -->
                            <div class="col-md-6 mb-4">
                                <label for="price" class="form-label required-field">السعر</label>
                                <div class="input-group">
                                    <input type="number" class="form-control @error('price') is-invalid @enderror"
                                        id="price" name="price" value="{{ old('price') }}" step="0.01"
                                        placeholder="0.00" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">جنيه</span>
                                    </div>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Category -->
                            <div class="col-md-6 mb-4">
                                <label for="category_id" class="form-label required-field">التصنيف</label>
                                <select class="form-control select2 @error('category_id') is-invalid @enderror"
                                    id="category_id" name="category_id" required>
                                    <option value="">-- اختر التصنيف --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Image Upload -->
                            <div class="col-md-6 mb-4">
                                <label for="image" class="form-label">صورة المنتج</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image" accept="image/*" onchange="previewImage(event)">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Image Preview -->
                            <div class="col-md-12 mb-4">
                                <label class="form-label">معاينة الصورة</label>
                                <div class="image-preview" id="imagePreview"
                                    onclick="document.getElementById('image').click()">
                                    <div class="placeholder">
                                        <i class="fas fa-cloud-upload-alt fa-3x mb-2"></i>
                                        <p class="mb-0">اضغط لاختيار صورة أو اسحبها هنا</p>
                                        <small class="text-muted">PNG, JPG, JPEG (MAX. 2MB)</small>
                                    </div>
                                    <img id="preview" src="" alt="Preview">
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-md-12 mb-4">
                                <label for="description" class="form-label required-field">الوصف</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="4" placeholder="أدخل وصف تفصيلي للمنتج" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status Switches -->
                            <div class="col-md-12 mb-4">
                                <div class="row">
                                    <!-- Is Active -->
                                    <div class="col-md-6">
                                        <div class="border rounded p-3 h-100">
                                            <div class="custom-control custom-switch custom-switch-lg">
                                                <input type="hidden" name="is_active" value="0">
                                                <input type="checkbox" class="custom-control-input" id="is_active"
                                                    name="is_active" value="1"
                                                    {{ old('is_active', 1) ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="is_active">
                                                    <strong>تفعيل المنتج</strong>
                                                    <br>
                                                    <small class="text-muted">هل تريد عرض المنتج للمستخدمين؟</small>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Is Special -->
                                    <div class="col-md-6">
                                        <div class="border rounded p-3 h-100">
                                            <div class="custom-control custom-switch custom-switch-lg">
                                                <input type="hidden" name="is_special" value="0">
                                                <input type="checkbox" class="custom-control-input" id="is_special"
                                                    name="is_special" value="1"
                                                    {{ old('is_special') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="is_special">
                                                    <strong>منتج مميز</strong>
                                                    <br>
                                                    <small class="text-muted">عرض المنتج في الصفحة الرئيسية</small>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Submit Buttons -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary btn-lg px-5">
                                        <i class="fas fa-save ml-2"></i>
                                        حفظ المنتج
                                    </button>
                                    <button type="reset" class="btn btn-secondary btn-lg px-4">
                                        <i class="fas fa-redo ml-2"></i>
                                        إعادة تعيين
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- row closed -->
@endsection

@section('js')
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Initialize Select2
            $('.select2').select2({
                placeholder: "-- اختر التصنيف --",
                allowClear: true
            });

            // Image Preview Function
            window.previewImage = function(event) {
                const file = event.target.files[0];
                const preview = document.getElementById('preview');
                const imagePreview = document.getElementById('imagePreview');

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        imagePreview.classList.add('has-image');
                    }

                    reader.readAsDataURL(file);
                } else {
                    preview.src = '';
                    imagePreview.classList.remove('has-image');
                }
            }

            // Drag and Drop for Image
            const imagePreview = document.getElementById('imagePreview');
            const imageInput = document.getElementById('image');

            imagePreview.addEventListener('dragover', (e) => {
                e.preventDefault();
                imagePreview.style.borderColor = '#667eea';
                imagePreview.style.background = '#edf2f7';
            });

            imagePreview.addEventListener('dragleave', (e) => {
                e.preventDefault();
                imagePreview.style.borderColor = '#e2e8f0';
                imagePreview.style.background = '#f7fafc';
            });

            imagePreview.addEventListener('drop', (e) => {
                e.preventDefault();
                imagePreview.style.borderColor = '#e2e8f0';
                imagePreview.style.background = '#f7fafc';

                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    imageInput.files = files;
                    previewImage({
                        target: imageInput
                    });
                }
            });
        });
    </script>
@endsection
