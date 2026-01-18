@extends('FrontStore.layouts.app')
@section('title', 'HPM Agriculture - تمكين الزراعة الحديثة')

@section('content')
<main class="overflow-hidden">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-green-900 via-green-800 to-gray-900 min-h-[90vh] flex items-center justify-center overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 z-0">
             <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-green-500 rounded-full mix-blend-overlay filter blur-3xl opacity-20 animate-blob"></div>
             <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-96 h-96 bg-yellow-500 rounded-full mix-blend-overlay filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
             <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-white rounded-full mix-blend-overlay filter blur-[100px] opacity-5"></div>
        </div>

        <div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 text-center" x-data="{ loaded: false }" x-init="setTimeout(() => loaded = true, 100)">
            <span class="inline-block py-1 px-3 rounded-full bg-green-500/20 border border-green-500/30 text-green-300 text-sm font-semibold mb-6 backdrop-blur-sm transition-all duration-700 transform"
                  :class="loaded ? 'translate-y-0 opacity-100' : 'translate-y-4 opacity-0'">
                شريكك الأول للنجاح الزراعي
            </span>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold text-white mb-6 leading-tight tracking-tight transition-all duration-700 delay-100 transform"
                :class="loaded ? 'translate-y-0 opacity-100' : 'translate-y-8 opacity-0'">
                نبتكر لأجل <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-yellow-400">نمو محاصيلك</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-300 mb-10 max-w-3xl mx-auto leading-relaxed transition-all duration-700 delay-200 transform"
               :class="loaded ? 'translate-y-0 opacity-100' : 'translate-y-8 opacity-0'">
                نقدم حلولاً زراعية متكاملة، من الأسمدة عالية الجودة إلى خطط رعاية المحاصيل المخصصة، لضمان أعلى إنتاجية وأفضل جودة.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center transition-all duration-700 delay-300 transform"
                 :class="loaded ? 'translate-y-0 opacity-100' : 'translate-y-8 opacity-0'">
                <a href="{{ route('storeProducts') }}" class="group bg-green-600 text-white text-lg font-bold px-8 py-4 rounded-full shadow-lg shadow-green-500/30 hover:bg-green-500 hover:shadow-green-400/50 hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2">
                    <span>تسوق الآن</span>
                    <svg class="w-5 h-5 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
                <a href="{{ route('aboutUs') }}" class="group bg-white/10 text-white text-lg font-bold px-8 py-4 rounded-full backdrop-blur-sm border border-white/20 hover:bg-white/20 hover:-translate-y-1 transition-all duration-300">
                    اكتشف المزيد
                </a>
            </div>
        </div>
        
        <!-- Scrolldown Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce opacity-70">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-12 bg-white border-b border-gray-100 relative z-20 -mt-10 mx-4 md:mx-12 rounded-2xl shadow-xl">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 divide-x divide-x-reverse divide-gray-100 px-6">
            <div class="text-center group p-4">
                <div class="text-3xl md:text-4xl font-extrabold text-green-600 mb-1 group-hover:scale-110 transition-transform duration-300">+500</div>
                <div class="text-sm text-gray-500 font-medium">منتج زراعي</div>
            </div>
            <div class="text-center group p-4">
                <div class="text-3xl md:text-4xl font-extrabold text-green-600 mb-1 group-hover:scale-110 transition-transform duration-300">+10k</div>
                <div class="text-sm text-gray-500 font-medium">عميل سعيد</div>
            </div>
             <div class="text-center group p-4">
                <div class="text-3xl md:text-4xl font-extrabold text-green-600 mb-1 group-hover:scale-110 transition-transform duration-300">+15</div>
                <div class="text-sm text-gray-500 font-medium">سنة خبرة</div>
            </div>
            <div class="text-center group p-4">
                <div class="text-3xl md:text-4xl font-extrabold text-green-600 mb-1 group-hover:scale-110 transition-transform duration-300">24/7</div>
                <div class="text-sm text-gray-500 font-medium">دعم فني</div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" x-data="{ shown: false }" x-init="setTimeout(() => shown = true, 300)">
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl mb-4 transition-all duration-700 transform"
                    :class="shown ? 'translate-y-0 opacity-100' : 'translate-y-8 opacity-0'">لماذا تختار HPM؟</h2>
                <div class="w-24 h-1.5 bg-green-500 mx-auto rounded-full transition-all duration-700 delay-100 transform"
                     :class="shown ? 'scale-100 opacity-100' : 'scale-0 opacity-0'"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group border border-gray-100" x-data="{ shown: false }" x-init="setTimeout(() => shown = true, 500)">
                    <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300 transform group-hover:rotate-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">جودة معتمدة</h3>
                    <p class="text-gray-600 leading-relaxed">جميع منتجاتنا تخضع لاختبارات صارمة ومعتمدة من وزارة الزراعة لضمان الفعالية والأمان.</p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group border border-gray-100" x-data="{ shown: false }" x-init="setTimeout(() => shown = true, 700)">
                    <div class="w-16 h-16 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-green-600 group-hover:text-white transition-colors duration-300 transform group-hover:rotate-6">
                         <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">تركيبات متطورة</h3>
                    <p class="text-gray-600 leading-relaxed">نستخدم أحدث التقنيات العلمية لتطوير أسمدة ومبيدات تضاعف الإنتاج وتقاوم الآفات.</p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group border border-gray-100" x-data="{ shown: false }" x-init="setTimeout(() => shown = true, 900)">
                    <div class="w-16 h-16 bg-yellow-50 text-yellow-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-yellow-600 group-hover:text-white transition-colors duration-300 transform group-hover:rotate-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">أسعار تنافسية</h3>
                    <p class="text-gray-600 leading-relaxed">نلتزم بتقديم أفضل قيمة مقابل سعر في السوق، مع عروض حصرية لعملائنا الدائمين.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="py-24 bg-white relative overflow-hidden">
        <!-- Background Decor -->
        <div class="absolute top-0 left-0 w-64 h-64 bg-green-50 rounded-full blur-3xl opacity-50 -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-yellow-50 rounded-full blur-3xl opacity-50 translate-x-1/2 translate-y-1/2"></div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12">
                <div class="text-right">

                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">المنتجات المميزة</h2>
                </div>
                <a href="{{ route('storeProducts') }}" class="hidden md:inline-flex items-center gap-2 text-green-600 font-bold hover:text-green-800 transition-colors group">
                    عرض كل المنتجات
                    <svg class="w-5 h-5 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            @if (!$specialProducts->isEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach ($specialProducts as $index => $specialProduct)
                        <div class="bg-white rounded-2xl border border-gray-100 hover:border-green-200 shadow-sm hover:shadow-2xl transition-all duration-500 group relative flex flex-col h-full"
                             x-data="{ shown: false }" x-init="setTimeout(() => shown = true, 100)"
                             :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                             style="transition-delay: {{ $index * 100 }}ms">
                            
                            <!-- Discount Badge (Optional dummy logic) -->
                            <div class="absolute top-4 left-4 z-20">
                                <span class="bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-md shadow-sm">موصى به</span>
                            </div>

                            <!-- Image Area -->
                            <div class="relative h-64 bg-gray-50 rounded-t-2xl overflow-hidden p-6 group-hover:bg-green-50/30 transition-colors duration-500">
                                <img src="{{ asset('storage/'.$specialProduct->image) }}" alt="{{ $specialProduct->name }}" class="w-full h-full object-contain transform group-hover:scale-110 transition-transform duration-700 drop-shadow-sm group-hover:drop-shadow-lg" />
                                
                                <!-- Quick Actions Overlay -->
                                <div class="absolute inset-0 bg-black/5 backdrop-blur-[1px] opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-3">
                                    <a href="{{ route('storeProduct.show', $specialProduct->id) }}" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-gray-800 shadow-lg hover:bg-green-600 hover:text-white transition-all transform hover:scale-110" title="عرض التفاصيل">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                    </a>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-6 flex-1 flex flex-col relative z-10 bg-white rounded-b-2xl">
                                <h3 class="text-lg font-bold text-gray-900 mb-2 truncate group-hover:text-green-600 transition-colors">{{ $specialProduct->name }}</h3>
                                <div class="flex items-center gap-1 mb-3">
                                    <template x-for="i in 5">
                                        <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    </template>
                                </div>
                                <div class="mt-auto flex items-center justify-between">
                                    <div class="flex flex-col">
                                        <span class="text-gray-400 text-xs line-through"></span>
                                        <span class="text-xl font-bold text-gray-900">{{ $specialProduct->price }} جنيه</span>
                                    </div>
                                    <button class="add-to-cart bg-green-50 text-green-700 hover:bg-green-600 hover:text-white p-3 rounded-xl transition-all duration-300 shadow-sm hover:shadow-green-300 hover:shadow-md"
                                        data-id="{{ $specialProduct->id }}"
                                        data-name="{{ $specialProduct->name }}" 
                                        data-price="{{ $specialProduct->price }}"
                                        data-image="{{ asset($specialProduct->image) }}"
                                        title="أضف للسلة">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20 bg-gray-50 rounded-3xl border-2 border-dashed border-gray-200">
                    <div class="bg-white w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6 shadow-sm">
                        <svg class="h-10 w-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">لا توجد منتجات مميزة حالياً</h3>
                    <p class="text-gray-500">تابعنا قريباً للعروض الجديدة</p>
                </div>
            @endif
            
            <div class="mt-12 text-center md:hidden">
                 <a href="{{ route('storeProducts') }}" class="inline-flex items-center gap-2 bg-green-600 text-white font-bold py-3 px-8 rounded-full shadow-lg hover:bg-green-700 transition-colors">
                    عرض كل المنتجات
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-green-900 relative overflow-hidden">
        <div class="absolute inset-0">
             <div class="absolute top-0 right-0 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
             <div class="absolute -left-20 -bottom-20 w-96 h-96 bg-green-400 rounded-full mix-blend-overlay filter blur-3xl opacity-20 animate-blob"></div>
        </div>
        <div class="container mx-auto px-4 relative z-10 text-center">
            <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-6">هل لديك استفسار زراعي؟</h2>
            <p class="text-green-100 text-lg md:text-xl max-w-2xl mx-auto mb-10">فريقنا من الخبراء جاهز للرد على جميع استفساراتك وتقديم النصائح لزيادة إنتاجية أرضك.</p>
            <a href="{{ route('contactForm') }}" class="inline-block bg-white text-green-900 font-bold text-lg px-10 py-4 rounded-full shadow-2xl hover:bg-green-50 hover:scale-105 transition-transform duration-300">تحدث مع خبير</a>
        </div>
    </section>
</main>

<script>
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent default if wrapped in anchor (though it's a button here)
            let id = this.dataset.id;
            
            // Animation feedback
            let originalContent = this.innerHTML;
            this.innerHTML = '<svg class="animate-spin w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';
            this.disabled = true;

            fetch("{{ route('cart.add') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify({
                        id: id
                    })
                })
                .then(res => res.json())
                .then(data => {
                    // Restore button with checkmark
                    this.innerHTML = '<svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>';
                    setTimeout(() => {
                        this.innerHTML = originalContent;
                        this.disabled = false;
                    }, 2000);
                    
                    // Dispatch Custom Event to update Cart Count in Nav
                    if (data.cart) {
                        let count = Object.keys(data.cart).length;
                        window.dispatchEvent(new CustomEvent('cart-updated', { detail: { count: count } }));
                    }

                    // Create a simple toast
                    const toast = document.createElement('div');
                    toast.className = 'fixed bottom-4 left-4 bg-gray-900 text-white px-6 py-3 rounded-lg shadow-xl z-50 animate-fade-in-up flex items-center gap-3';
                    toast.innerHTML = '<svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> <span>تم إضافة المنتج للسلة بنجاح</span>';
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                })
                .catch(error => {
                    console.error('Error:', error);
                    this.innerHTML = originalContent;
                    this.disabled = false;
                });
        });
    });
</script>
@endsection
