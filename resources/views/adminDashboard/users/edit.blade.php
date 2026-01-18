@extends('adminDashboard.layouts.master')

@section('title')
    تعديل مستخدم
@endsection

@section('css')
    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #e9ecef;
        }

        label {
            font-weight: 600;
        }
    </style>
@endsection

@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المستخدمين</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل مستخدم</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row row-sm">
        <div class="col-xl-12">

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            <div class="card mg-b-20">
                <div class="card-header">
                    <h4 class="card-title mb-0">تعديل بيانات المستخدم</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <!-- الاسم -->
                            <div class="col-md-6 mb-3">
                                <label>الاسم</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $user->name) }}" required>
                            </div>

                            <!-- البريد -->
                            <div class="col-md-6 mb-3">
                                <label>البريد الإلكتروني</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $user->email) }}" required>
                            </div>

                            <!-- كلمة المرور -->
                            <div class="col-md-6 mb-3">
                                <label>كلمة المرور (اختياري)</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="اتركها فارغة إن لم ترغب بالتغيير">
                            </div>

                            <!-- تأكيد كلمة المرور -->
                            <div class="col-md-6 mb-3">
                                <label>تأكيد كلمة المرور</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>

                            <!-- نوع المستخدم -->
                            @if(auth()->user()->is_superadmin)
                                <div class="col-md-6 mb-3">
                                    <label>نوع المستخدم</label>
                                    <select name="is_superadmin" class="form-control">
                                        <option value="0" {{ !$user->is_superadmin ? 'selected' : '' }}>
                                            مستخدم عادي
                                        </option>
                                        <option value="1" {{ $user->is_superadmin ? 'selected' : '' }}>
                                            مشرف رئيسي
                                        </option>
                                    </select>
                                </div>
                            @endif

                        </div>

                        <div class="text-right mt-4">
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-right ml-1"></i> رجوع
                            </a>

                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save ml-1"></i> حفظ التعديلات
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
