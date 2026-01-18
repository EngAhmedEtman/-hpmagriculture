@extends('FrontStore.layouts.app')
@section('title', $product->name . ' - HPM Agriculture')

@section('content')
<main class="min-h-screen bg-gray-50 font-sans">
    
    <!-- Breadcrumbs -->
    <nav class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <ol class="flex items-center space-x-2 space-x-reverse text-sm text-gray-500">
            <li><a href="{{ route('home') }}" class="hover:text-green-600 transition-colors">الرئيسية</a></li>
            <li><svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg></li>
            <li><a href="{{ route('storeProducts') }}" class="hover:text-green-600 transition-colors">المتجر</a></li>
            <li><svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg></li>
            <li class="text-gray-900 font-medium truncate max-w-xs">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 pb-16">
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden ring-1 ring-black/5">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-0 lg:gap-8">
                
                <!-- Product Image Column -->
                <div class="relative bg-gray-100 p-8 lg:p-16 flex items-center justify-center min-h-[500px] lg:min-h-[600px] group">
                    <div class="absolute inset-0 bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:20px_20px] opacity-50"></div>
                     <img src="{{ asset('storage/' . $product->image) }}" class="relative z-10 w-full max-w-md h-auto object-contain transform transition-transform duration-700 ease-in-out group-hover:scale-110 drop-shadow-2xl" id="main-image" alt="{{ $product->name }}">
                </div>

                <!-- Product Details Column -->
                <div class="p-8 lg:p-12 flex flex-col justify-center bg-white">
                    <div class="mb-6">
                        <span class="inline-block px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full mb-4">منتج أصلي</span>
                        <h1 class="text-3xl lg:text-5xl font-extrabold text-gray-900 tracking-tight leading-tight mb-4">{{ $product->name }}</h1>
                        
                        <!-- Rating Mockup (Optional) -->
                        <div class="flex items-center mb-6">
                            <div class="flex text-yellow-400 ml-2">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            </div>
                            <span class="text-gray-500 text-sm">(جودة مضمونة)</span>
                        </div>
                    </div>

                     <!-- Price -->
                    <div class="flex items-end mb-8 border-b border-gray-100 pb-8">
                        <span class="text-5xl font-black text-green-600">{{ number_format($product->price) }}</span>
                        <span class="text-xl font-medium text-gray-500 mb-2 mr-2">جنيه</span>
                    </div>

                    <!-- Short Description -->
                    <div class="prose prose-green text-gray-600 mb-10 leading-relaxed">
                        <p>{{ \Illuminate\Support\Str::limit($product->description, 150) }}</p>
                    </div>

                    <!-- Actions -->
                    <div class="flex flex-col sm:flex-row gap-4 mb-10">
                        <!-- Quantity Selector (Frontend visual only for now, logic can be added later if cart supports it) -->
                        <div class="flex items-center rounded-xl border border-gray-300 px-3 h-14 w-full sm:w-auto bg-white" x-data="{ qty: 1 }">
                             <button type="button" @click="qty > 1 ? qty-- : null" class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-green-600 transition-colors bg-gray-50 rounded-lg hover:bg-gray-100">-</button>
                             <input type="number" x-model="qty" class="w-12 text-center text-gray-900 font-bold focus:outline-none border-none h-full m-0 p-0" min="1" readonly>
                             <button type="button" @click="qty++" class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-green-600 transition-colors bg-gray-50 rounded-lg hover:bg-gray-100">+</button>
                        </div>

                        <button class="add-to-cart flex-1 bg-green-600 text-white rounded-xl h-14 px-8 text-lg font-bold shadow-green-200 shadow-lg hover:shadow-green-300 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-3 active:scale-95"
                            data-id="{{ $product->id }}" 
                            data-name="{{ $product->name }}"
                            data-price="{{ $product->price }}" 
                            data-image="{{ asset('storage/' . $product->image) }}">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                            أضف إلى السلة
                        </button>
                    </div>

                    <!-- Trust Badges -->
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-6 text-center border-t border-gray-100 pt-8">
                        <div class="flex flex-col items-center gap-2">
                             <div class="w-10 h-10 rounded-full bg-green-50 flex items-center justify-center text-green-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                             </div>
                             <span class="text-xs font-semibold text-gray-600">جودة أصلية 100%</span>
                        </div>
                        <div class="flex flex-col items-center gap-2">
                            <div class="w-10 h-10 rounded-full bg-green-50 flex items-center justify-center text-green-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <span class="text-xs font-semibold text-gray-600">شحن سريع</span>
                        </div>
                        <div class="flex flex-col items-center gap-2">
                            <div class="w-10 h-10 rounded-full bg-green-50 flex items-center justify-center text-green-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <span class="text-xs font-semibold text-gray-600">دعم متواصل</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabs Section (Description, Specs) -->
            <div class="border-t border-gray-100 p-8 lg:p-12 bg-gray-50/50" x-data="{ activeTab: 'description' }">
                <div class="flex space-x-8 space-x-reverse border-b border-gray-200 mb-8 overflow-x-auto">
                    <button @click="activeTab = 'description'" :class="{ 'border-green-600 text-green-700': activeTab === 'description', 'border-transparent text-gray-500 hover:text-gray-700': activeTab !== 'description' }" class="whitespace-nowrap pb-4 px-1 border-b-2 font-bold text-lg transition-colors">
                        وصف المنتج
                    </button>
                    <button @click="activeTab = 'shipping'" :class="{ 'border-green-600 text-green-700': activeTab === 'shipping', 'border-transparent text-gray-500 hover:text-gray-700': activeTab !== 'shipping' }" class="whitespace-nowrap pb-4 px-1 border-b-2 font-bold text-lg transition-colors">
                        معلومات الشحن
                    </button>
                </div>

                <div x-show="activeTab === 'description'" x-transition:enter="transition ease-out duration-300" class="prose prose-lg max-w-none text-gray-600 leading-relaxed">
                    @foreach(explode("\n", $product->description) as $paragraph)
                        @if(trim($paragraph) != '')
                            <p class="mb-4">{{ $paragraph }}</p>
                        @endif
                    @endforeach
                </div>

                <div x-show="activeTab === 'shipping'" x-transition:enter="transition ease-out duration-300" class="prose prose-lg max-w-none text-gray-600 hidden" style="display: none;">
                    <p>نقوم بالشحن إلى جميع محافظات مصر. يستغرق الشحن عادة من 2 إلى 5 أيام عمل حسب المحافظة.</p>
                </div>
            </div>

        </div>
    </div>
</main>

<script>
document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', function() {
        let id = this.dataset.id;
        
        // Animation
        let originalText = this.innerHTML;
        this.innerHTML = '<span class="flex items-center gap-2"><svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> جاري الإضافة...</span>';
        this.disabled = true;

        fetch("{{ route('cart.add') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Accept": "application/json"
            },
            body: JSON.stringify({
                id: id,
                // If we want to support quantity in backend later, we can pass it here:
                // quantity: document.querySelector('[x-model="qty"]').value 
            })
        })
        .then(res => res.json())
        .then(data => {
            this.innerHTML = '<span class="flex items-center gap-2"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> تم بنجاح</span>';
            setTimeout(() => {
                this.innerHTML = originalText;
                this.disabled = false;
            }, 2000);
            
            // Optional: Show a fancy toast instead of alert
            // alert('تم إضافة المنتج للسلة بنجاح');
        })
        .catch(error => {
            console.error('Error:', error);
            this.innerHTML = originalText;
            this.disabled = false;
            alert("حدث خطأ أثناء إضافة المنتج!");
        });
    });
});
</script>

@endsection
