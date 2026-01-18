@extends('adminDashboard.layouts.master')

@section('title')
    إضافة سؤال جديد
@endsection

@section('css')
    <link href="{{ URL::asset('assets/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
@endsection

@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الأسئلة الشائعة</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إضافة سؤال جديد</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <!-- Success Message -->
                    @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert">
                                <span>&times;</span>
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
                            <button type="button" class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                        </div>
                    @endif

                    <form action="{{ route('faqs.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="question">السؤال</label>
                            <input type="text" name="question" id="question" class="form-control"
                                placeholder="أدخل السؤال" value="{{ old('question') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="answer">الإجابة</label>
                            <textarea name="answer" id="answer" class="form-control" rows="5" required>{{ old('answer') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="is_active">الحالة</label>
                            <select name="is_active" id="is_active" class="form-control">
                                <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>مفعل</option>
                                <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>معطل</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus ml-1"></i> إضافة السؤال
                        </button>
                        <a href="{{ route('faqs.index') }}" class="btn btn-secondary">رجوع</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ URL::asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#answer').summernote({
                height: 200,
                placeholder: 'أدخل الإجابة هنا'
            });
        });
    </script>
@endsection
