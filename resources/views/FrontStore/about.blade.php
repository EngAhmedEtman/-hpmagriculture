@extends('FrontStore.layouts.app')
@section('title', 'من نحن - HPM Agriculture')

@section('content')
<main class="min-h-screen bg-white font-sans overflow-hidden">
    
    <!-- Hero Section -->
    <div class="relative bg-green-900 py-24 sm:py-32 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1595839019466-932c253d5a49?q=80&w=2072&auto=format&fit=crop" alt="Background" class="w-full h-full object-cover opacity-20">
            <div class="absolute inset-0 bg-gradient-to-t from-green-900 via-green-900/60"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-6xl mb-6">
                نزرع المستقبل، <br class="hidden sm:block" /> لنحصد الرخاء.
            </h1>
            <p class="mt-4 text-xl text-green-100 max-w-3xl mx-auto leading-relaxed">
                في HPM Agriculture، نمزج بين أصالة الزراعة وأحدث التقنيات العالمية لتقديم حلول مستدامة تضمن نمو محاصيلك وازدهار استثمارك.
            </p>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-green-800 py-10 border-t border-green-700/50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <dl class="grid grid-cols-1 gap-y-8 gap-x-8 text-center sm:grid-cols-2 lg:grid-cols-4">
                <div class="flex flex-col gap-y-2 p-4">
                    <dt class="text-base leading-7 text-green-200">سنة خبرة</dt>
                    <dd class="order-first text-4xl font-bold tracking-tight text-white">15+</dd>
                </div>
                <div class="flex flex-col gap-y-2 p-4 border-t border-green-700/50 sm:border-t-0 sm:border-r border-green-700/50 lg:border-r-0">
                    <dt class="text-base leading-7 text-green-200">عميل سعيد</dt>
                    <dd class="order-first text-4xl font-bold tracking-tight text-white">10k+</dd>
                </div>
                <div class="flex flex-col gap-y-2 p-4 border-t border-green-700/50 lg:border-t-0 lg:border-r border-green-700/50">
                    <dt class="text-base leading-7 text-green-200">منتج معتمد</dt>
                    <dd class="order-first text-4xl font-bold tracking-tight text-white">500+</dd>
                </div>
                <div class="flex flex-col gap-y-2 p-4 border-t border-green-700/50 sm:border-t-0 sm:border-l border-green-700/50">
                    <dt class="text-base leading-7 text-green-200">فدان مُغطى</dt>
                    <dd class="order-first text-4xl font-bold tracking-tight text-white">1M+</dd>
                </div>
            </dl>
        </div>
    </div>

    <!-- Our Story Section -->
    <div class="overflow-hidden py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-16 gap-y-16 items-center">
                <div class="relative order-2 lg:order-1">
                    <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=1932&auto=format&fit=crop" alt="Our Farm" class="w-full rounded-2xl shadow-xl ring-1 ring-gray-900/10">
                    <div class="absolute -bottom-8 -right-8 w-64 h-64 bg-green-100 rounded-full mix-blend-multiply filter blur-3xl opacity-50 -z-10"></div>
                </div>
                <div class="order-1 lg:order-2">
                    <div class="text-green-600 font-bold mb-2 tracking-wide uppercase text-sm">قصتنا</div>
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl mb-6">رؤيتنا ورسالتنا</h2>
                    <p class="text-lg leading-8 text-gray-600 mb-6">
                        تأسست <strong class="text-green-700">HPM</strong> لتكون الجسر الذي يربط بين المزارع وأحدث التقنيات والمستلزمات الزراعية العالمية. نحن نؤمن بأن الزراعة هي أساس الحضارة، ولذلك نسعى لتوفير أجود أنواع البذور، الأسمدة، والمعدات.
                    </p>
                    <p class="text-lg leading-8 text-gray-600 mb-8">
                        هدفنا هو دعم المزارع العربي لزيادة إنتاجيته مع الحفاظ على الموارد الطبيعية باستخدام حلول زراعية مستدامة وصديقة للبيئة، لنصنع معاً مستقبلاً أخضر.
                    </p>
                    <a href="{{ route('storeProducts') }}" class="inline-flex items-center text-green-600 font-semibold hover:text-green-500 transition-colors group">
                        تصفح منتجاتنا الآن
                        <svg class="w-5 h-5 mr-2 transform transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Values Section -->
    <div class="bg-gray-50 py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center mb-16">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">لماذا يختارنا المزارعون؟</h2>
                <p class="mt-4 text-lg text-gray-600">نلتزم بأعلى معايير الجودة والخدمة لضمان رضا عملائنا ونجاح محاصيلهم.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Feature 1 -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center text-green-600 mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">جودة مضمونة</h3>
                    <p class="text-gray-600 leading-relaxed">
                        نخضع جميع منتجاتنا لاختبارات صارمة ونعمل فقط مع موردين عالميين موثوقين لضمان فعالية وسلامة كل منتج نبيعه.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center text-green-600 mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">حلول مبتكرة</h3>
                    <p class="text-gray-600 leading-relaxed">
                        نواكب أحدث التطورات العلمية في مجال الزراعة لنقدم لك حلولاً ذكية تزيد من الإنتاجية وتقلل من التكلفة.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center text-green-600 mb-6">
                         <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">سرعة في التوصيل</h3>
                    <p class="text-gray-600 leading-relaxed">
                        شبكتنا اللوجستية المتطورة تضمن وصول طلباتك إلى باب مزرعتك في أي مكان في مصر وفي أسرع وقت ممكن.
                    </p>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection
