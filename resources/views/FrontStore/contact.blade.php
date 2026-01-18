@extends('FrontStore.layouts.app')
@section('title', 'تواصل معنا - Hpm للأسمدة والكيماويات')
@section('content')

<style>
/* ===== رسالة الأخطاء ===== */
.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
    padding: 12px 20px;
    border-radius: 6px;
    margin-bottom: 16px;
    font-size: 14px;
}

.alert-danger ul {
    margin: 0;
    padding-left: 18px;
}

.alert-danger li {
    margin-bottom: 6px;
}

/* ===== رسالة النجاح ===== */
.alert-success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
    padding: 12px 20px;
    border-radius: 6px;
    margin-bottom: 16px;
    font-size: 14px;
}

/* ===== رسائل الأخطاء تحت الحقول (مثل رقم الهاتف) ===== */
.error-message {
    color: #d93025; /* أحمر لطيف */
    font-size: 13px;
    margin-top: 4px;
    display: block;
}

/* ===== رسالة النجاح تحت الفورم (اختياري) ===== */
.success-message {
    color: #155724;
    font-size: 14px;
    margin-top: 10px;
    display: block;
}
</style>

<main class="container contact-page">
    <h2 class="page-title">تواصل معنا</h2>
    <p class="contact-description">
        يسعدنا تلقي استفساراتكم وملاحظاتكم عبر النموذج التالي:
    </p>

    <!-- عرض رسالة النجاح -->
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- عرض الأخطاء -->
    @if ($errors->any())
        <div class="alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="contact-form" class="contact-form" method="post" action="{{ route('submitContactForm') }}">
        @csrf
        <div class="form-group">
            <label for="name">الاسم الكامل:</label>
            <input type="text" id="name" name="name" required aria-label="الاسم الكامل" value="{{ old('name') }}" />
        </div>

        <div class="form-group">
            <label for="phone">رقم الهاتف:</label>
            <input type="tel" id="phone" name="phone" required pattern="[0-9]{11}" aria-label="رقم الهاتف" value="{{ old('phone') }}" />
            <small class="error-message" id="phone-error"></small>
        </div>

        <div class="form-group">
            <label for="message">الرسالة:</label>
            <textarea id="message" name="message" rows="5" required aria-label="الرسالة">{{ old('message') }}</textarea>
        </div>

        <button type="submit" class="btn primary-btn">إرسال الرسالة</button>
        <p id="submission-message" class="success-message" style="display: none"></p>
    </form>
</main>

@endsection('content')
