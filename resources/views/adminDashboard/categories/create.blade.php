@extends('adminDashboard.layouts.master')

@section('title')
    إضافة تصنيف جديد
@endsection

@section('css')
    <style>
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .form-label {
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 8px;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102,126,234,0.25);
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
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">التصنيفات</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إضافة تصنيف جديد</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="row row-sm">
    <div class="col-xl-12">

        {{-- رسائل الأخطاء --}}
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>يوجد أخطاء في البيانات:</strong>
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
                        إضافة تصنيف جديد
                    </h4>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-right ml-1"></i> العودة
                    </a>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="row">

                        {{-- الاسم --}}
                        <div class="col-md-6 mb-4">
                            <label for="name" class="form-label required-field">الاسم</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="name" name="name" value="{{ old('name') }}" placeholder="أدخل اسم التصنيف" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- الوصف --}}
                        <div class="col-md-6 mb-4">
                            <label for="description" class="form-label">الوصف</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                id="description" name="description" rows="3"
                                placeholder="أدخل وصف التصنيف">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- الحالة --}}
                        <div class="col-md-6 mb-4">
                            <div class="custom-control custom-switch custom-switch-lg">
                                <input type="hidden" name="active" value="0">
                                <input type="checkbox" class="custom-control-input" id="active"
                                    name="active" value="1" {{ old('active',1) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="active">
                                    <strong>نشط</strong>
                                </label>
                            </div>
                        </div>

                    </div>

                    {{-- زر الحفظ --}}
                    <div class="row mt-4">
                        <div class="col-12 d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                <i class="fas fa-save ml-2"></i> حفظ التصنيف
                            </button>
                            <button type="reset" class="btn btn-secondary btn-lg px-4">
                                <i class="fas fa-redo ml-2"></i> إعادة تعيين
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection
