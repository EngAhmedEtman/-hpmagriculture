@extends('adminDashboard.layouts.master')

@section('title')
    تعديل سؤال شائع
@endsection

@section('css')
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('page-header')
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الأسئلة الشائعة</h4>
            <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل سؤال</span>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">

        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ route('faqs.update', $faq->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="question">السؤال</label>
                        <input type="text" name="question" id="question" class="form-control @error('question') is-invalid @enderror"
                               value="{{ old('question', $faq->question) }}" placeholder="أدخل السؤال">
                        @error('question')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="answer">الإجابة</label>
                        <textarea name="answer" id="answer" class="form-control @error('answer') is-invalid @enderror" rows="5" placeholder="أدخل الإجابة">{{ old('answer', $faq->answer) }}</textarea>
                        @error('answer')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="is_active">الحالة</label>
                        <select name="is_active" id="is_active" class="form-control @error('is_active') is-invalid @enderror">
                            <option value="1" {{ old('is_active', $faq->is_active) == 1 ? 'selected' : '' }}>مفعل</option>
                            <option value="0" {{ old('is_active', $faq->is_active) == 0 ? 'selected' : '' }}>معطل</option>
                        </select>
                        @error('is_active')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">تحديث السؤال</button>
                    <a href="{{ route('faqs.index') }}" class="btn btn-secondary">إلغاء</a>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection

@section('js')
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
@endsection
