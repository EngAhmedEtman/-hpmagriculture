@extends('adminDashboard.layouts.master')

@section('title')
    إنشاء مستخدم
@endsection

@section('css')
    <!-- CSS اختياري لتحسين الفورم -->
    <style>
        .form-control {
            border-radius: 6px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }
    </style>
@endsection

@section('page-header')
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">المستخدمين</h4>
            <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إنشاء مستخدم جديد</span>
        </div>
    </div>
</div>
@endsection

@section('content')


<div class="row row-sm">
    <div class="col-lg-6 col-md-8 m-auto">
        <!-- Success Message -->
        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <ul class="mb-0">
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
            <div class="card-header">
                <h3 class="card-title">إنشاء مستخدم جديد</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">البريد الإلكتروني</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="password">كلمة السر</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">تأكيد كلمة السر</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">
                        <i class="fas fa-user-plus ml-1"></i> إنشاء المستخدم
                    </button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">عودة للقائمة</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <!-- JS اختياري -->
@endsection
