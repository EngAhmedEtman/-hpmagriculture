@extends('FrontStore.layouts.app')
@section('title', 'HPM Agriculture - أفضل الأسمدة والمبيدات لمحاصيلك')

@section('content')
    <main>
        <!-- Hero Section -->
        <section class="relative bg-green-900 overflow-hidden">
            <!-- Background Decoration -->
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 bg-gradient-to-r from-green-900 to-green-800 opacity-90"></div>
                <!-- Pattern or Image -->
                 {{-- If you have a hero image, un-comment this:
                <img src="{{ asset('storage/hero-bg.jpg') }}" class="w-full h-full object-cover mix-blend-overlay opacity-20" alt="Hero Background">
                 --}}
                 <div class="absolute -top-24 -right-24 w-96 h-96 bg-green-500 rounded-full blur-3xl opacity-20"></div>
                 <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-yellow-500 rounded-full blur-3xl opacity-10"></div>
            </div>

            <!-- Content -->
            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32 flex flex-col items-center text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                    أفضل الأسمدة والمبيدات <br> <span class="text-green-400">لنمو محاصيلك</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-200 mb-10 max-w-2xl leading-relaxed">
                    نوفر أجود المستلزمات الزراعية لضمان إنتاجية عالية ونمو سليم. منتجاتنا معتمدة ومحضرة بعناية لخدمة أرضك ومحصولك.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('storeProducts') }}" class="btn primary-btn text-lg px-8 py-4 rounded-full shadow-lg hover:shadow-xl hover:scale-105 transition-all">
                        اكتشف منتجاتنا
                    </a>
                    <a href="{{ route('aboutUs') }}" class="btn secondary-btn bg-transparent border-white text-white hover:bg-white hover:text-green-900 hover:border-white text-lg px-8 py-4 rounded-full transition-all">
                        معرفة المزيد
                    </a>
                </div>
            </div>
        </section>

        <!-- Features/Values Section (Optional) -->
        <section class="py-12 bg-gray-50 border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                    <div class="p-6">
                        <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">جودة مضمونة</h3>
                        <p class="text-gray-600">منتجاتنا تخضع لأعلى معايير الجودة لضمان نتائج ممتازة.</p>
                    </div>
                    <div class="p-6">
                        <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">فعالية عالية</h3>
                        <p class="text-gray-600">تركيبات متطورة تمنح محاصيلك القوة والمناعة اللازمة.</p>
                    </div>
                    <div class="p-6">
                        <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">أفضل الأسعار</h3>
                        <p class="text-gray-600">نقدم أفضل قيمة مقابل سعر في السوق المصري.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Products -->
        <section class="py-16 container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl mb-4">منتجات مميزة</h2>
                <div class="w-24 h-1 bg-green-500 mx-auto rounded"></div>
            </div>

            @if (!$specialProducts->isEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    @foreach ($specialProducts as $specialProduct)
                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col h-full group">
                            <!-- Image -->
                            <div class="relative h-64 overflow-hidden bg-gray-100">
                                <img src="{{ asset('storage/'.$specialProduct->image) }}" alt="{{ $specialProduct->name }}" class="w-full h-full object-contain p-4 transition-transform duration-500 group-hover:scale-110" />
                                <div class="absolute inset-x-0 bottom-0 top-auto bg-gradient-to-t from-black/50 to-transparent p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 flex justify-center">
                                     <button class="add-to-cart bg-green-600 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg hover:bg-green-700 flex items-center gap-2"
                                        data-id="{{ $specialProduct->id }}"
                                        data-name="{{ $specialProduct->name }}" 
                                        data-price="{{ $specialProduct->price }}"
                                        data-image="{{ asset($specialProduct->image) }}">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                        أضف للسلة
                                    </button>
                                </div>
                            </div>

                            <!-- Info -->
                            <div class="p-6 flex-1 flex flex-col text-right">
                                <h4 class="text-lg font-bold text-gray-900 mb-2 truncate" title="{{ $specialProduct->name }}">{{ $specialProduct->name }}</h4>
                                <p class="text-sm text-gray-500 mb-4 flex-1">
                                    {{ \Illuminate\Support\Str::limit($specialProduct->description, 80, '...') }}
                                </p>
                                <div class="mt-auto flex items-center justify-between border-t border-gray-100 pt-4">
                                    <span class="text-xl font-bold text-green-600">{{ $specialProduct->price }} جنيه</span>
                                    <a href="{{ route('storeProduct.show', $specialProduct->id) }}" class="text-sm text-green-600 hover:text-green-800 font-medium hover:underline">عرض التفاصيل &larr;</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 bg-gray-50 rounded-lg border border-dashed border-gray-300">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                    <p class="mt-2 text-gray-500 font-medium">لا توجد منتجات مميزة حالياً</p>
                </div>
            @endif
        </section>
    </main>

    <script>
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function() {
                let id = this.dataset.id;
                
                // Optional: Animation feedback
                let originalText = this.innerHTML;
                this.innerHTML = '<span class="animate-pulse">جاري الإضافة...</span>';
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
                        // Restore button
                        this.innerHTML = originalText;
                        this.disabled = false;
                        
                        // Better notification (Tailwind toast could be used here, but for now alert is fine or a simple DOM message)
                        alert("تم إضافة المنتج للسلة بنجاح!");
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        this.innerHTML = originalText;
                        this.disabled = false;
                    });
            });
        });
    </script>
@endsection
