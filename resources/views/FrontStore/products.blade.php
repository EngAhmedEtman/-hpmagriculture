@extends('FrontStore.layouts.app')
@section('title', 'منتجاتنا - HPM Agriculture')

@section('content')
<main class="min-h-screen bg-gray-50 font-sans">
    
    <!-- Hero Header -->
    <div class="bg-green-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1625246333195-58197bd47d72?q=80&w=2070&auto=format&fit=crop')] bg-cover bg-center opacity-20"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-green-900 via-green-900/40"></div>
        <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24 text-center">
            <h2 class="text-4xl md:text-5xl font-extrabold tracking-tight mb-4 text-white">منتجاتنا المتميزة</h2>
            <p class="text-lg text-green-100 max-w-2xl mx-auto mb-8">
                اكتشف مجموعتنا المختارة من أفضل الأسمدة والمبيدات الزراعية، المصممة خصيصاً لزيادة إنتاجية محاصيلك.
            </p>
            
            <!-- Search Bar -->
            <div class="max-w-xl mx-auto relative">
                <input type="text" id="searchInput" placeholder="ابحث عن منتج..." class="w-full pl-12 pr-6 py-4 rounded-full border-none shadow-xl text-gray-900 focus:ring-4 focus:ring-green-500/30 transition-all text-lg placeholder-gray-400">
                <svg class="w-6 h-6 text-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 -mt-10 relative z-10">
        
        <!-- Filters / Sort (Visual Placeholder for now) -->
        <div class="flex flex-col sm:flex-row justify-between items-center mb-8 bg-white p-4 rounded-xl shadow-sm border border-gray-100 gap-4">
            <span class="text-gray-600 font-medium">عرض <span id="showing-count" class="font-bold text-gray-900">0</span> منتج</span>
            <div class="flex items-center gap-2">
                <span class="text-sm text-gray-500">ترتيب حسب:</span>
                <select class="border-gray-300 rounded-lg text-sm focus:ring-green-500 focus:border-green-500 cursor-pointer">
                    <option>الأكثر مبيعاً</option>
                    <option>الأعلى سعراً</option>
                    <option>الأقل سعراً</option>
                    <option>الجديد أولاً</option>
                </select>
            </div>
        </div>

        <!-- Product Grid -->
        <section id="product-list" class="min-h-[400px]">
            @if(!$products->isEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    @foreach ($products as $product)
                    <div class="product-card group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col h-full relative" data-name="{{ $product->name }}">
                        <!-- Badge -->
                        <div class="absolute top-4 right-4 z-10">
                            <span class="bg-green-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-sm">جديد</span>
                        </div>

                        <!-- Image -->
                        <div class="relative h-72 bg-gray-50 overflow-hidden p-6 flex items-center justify-center">
                             <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-contain transform transition-transform duration-700 group-hover:scale-110 drop-shadow-lg" loading="lazy" />
                             
                             <!-- Action Overlay -->
                             <div class="absolute inset-x-0 bottom-4 flex justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-2 group-hover:translate-y-0">
                                 <button class="add-to-cart bg-gray-900 text-white px-6 py-3 rounded-full text-sm font-bold shadow-lg hover:bg-green-600 transition-colors flex items-center gap-2"
                                    data-id="{{ $product->id }}"
                                    data-name="{{ $product->name }}" 
                                    data-price="{{ $product->price }}"
                                    data-image="{{ asset('storage/'.$product->image) }}">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                    أضف للسلة
                                </button>
                             </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6 flex-1 flex flex-col">
                            <div class="mb-2">
                                <h4 class="text-lg font-bold text-gray-900 hover:text-green-600 transition-colors line-clamp-1">
                                    <a href="{{ route('storeProduct.show', $product->id) }}">{{ $product->name }}</a>
                                </h4>
                                <div class="flex items-center mt-1">
                                    <div class="flex text-yellow-400 text-xs">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    </div>
                                    <span class="text-gray-400 text-xs mr-1">(تقييمات)</span>
                                </div>
                            </div>
                            
                            <p class="text-sm text-gray-500 mb-4 line-clamp-2 leading-relaxed">
                                {{ \Illuminate\Support\Str::limit($product->description, 90) }}
                            </p>

                            <div class="mt-auto flex items-center justify-between pt-4 border-t border-gray-50">
                                <div class="flex flex-col">
                                    <span class="text-xs text-gray-400 font-medium">السعر الحالي</span>
                                    <span class="text-xl font-bold text-gray-900">{{ number_format($product->price) }} <span class="text-xs font-normal">جنيه</span></span>
                                </div>
                                <a href="{{ route('storeProduct.show', $product->id) }}" class="p-2 text-gray-400 hover:text-green-600 hover:bg-green-50 rounded-full transition-all" title="عرض التفاصيل">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="flex flex-col items-center justify-center py-20 bg-white rounded-3xl border border-dashed border-gray-200">
                    <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">لا توجد منتجات متاحة</h3>
                    <p class="text-gray-500">نعمل على إضافة منتجات جديدة قريباً، يرجى التحقق لاحقاً.</p>
                </div>
            @endif
        </section>

        <!-- Pagination Buttons -->
        <div id="pagination" class="flex justify-center items-center gap-2 mt-16">
            <!-- JS Will Inject Buttons Here -->
        </div>

    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const products = Array.from(document.querySelectorAll('.product-card'));
    const searchInput = document.getElementById('searchInput');
    const showingCount = document.getElementById('showing-count');
    const pageSize = 8;
    let currentPage = 1;
    let filteredProducts = products;

    // Filter Logic
    function filterProducts() {
        const query = searchInput.value.toLowerCase().trim();
        filteredProducts = products.filter(product => {
            const name = product.dataset.name.toLowerCase();
            return name.includes(query);
        });
        
        currentPage = 1; // Reset to page 1 on filter
        renderPage();
    }

    searchInput.addEventListener('input', filterProducts);

    // Pagination Logic
    function renderPage() {
        const totalPages = Math.ceil(filteredProducts.length / pageSize);
        const start = (currentPage - 1) * pageSize;
        const end = start + pageSize;

        // Hide all first
        products.forEach(p => p.classList.add('hidden'));

        // Show filtered & paginated
        filteredProducts.forEach((product, index) => {
            if(index >= start && index < end) {
                product.classList.remove('hidden');
            }
        });

        // Update count
        if(showingCount) showingCount.textContent = filteredProducts.length;

        renderPaginationControls(totalPages);
        
        // Only scroll if we are not initial load and filter is not active (optional UX choice)
        // window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function renderPaginationControls(totalPages) {
        const container = document.getElementById('pagination');
        container.innerHTML = '';

        if (totalPages <= 1) return;

        // Previous
        // ... (Simplified for elegance) ...

        for(let i=1; i<=totalPages; i++) {
            const btn = document.createElement('button');
            btn.textContent = i;
            
            // Tailwind classes
            const baseClasses = ['w-10', 'h-10', 'flex', 'items-center', 'justify-center', 'rounded-lg', 'font-bold', 'transition-all', 'focus:outline-none'];
            const activeClasses = ['bg-green-600', 'text-white', 'shadow-lg', 'scale-110'];
            const inactiveClasses = ['bg-white', 'text-gray-600', 'hover:bg-green-50', 'hover:text-green-600', 'border', 'border-gray-200'];

            if(i === currentPage) {
                btn.classList.add(...baseClasses, ...activeClasses);
            } else {
                btn.classList.add(...baseClasses, ...inactiveClasses);
            }
            
            btn.addEventListener('click', () => {
                currentPage = i;
                renderPage();
                document.getElementById('product-list').scrollIntoView({ behavior: 'smooth', block: 'start' });
            });
            container.appendChild(btn);
        }
    }

    // Initial Render
    renderPage();

    // Add to Cart Logic
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function(e) {
            e.stopPropagation(); // Prevent card click
            let id = this.dataset.id;
            let originalContent = this.innerHTML;
            
            // Loading State
            this.innerHTML = '<svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';
            this.disabled = true;

            fetch("{{ route('cart.add') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Accept": "application/json"
                },
                body: JSON.stringify({id: id})
            })
            .then(res => res.json())
            .then(data => {
                // Success State
                this.innerHTML = '<svg class="w-5 h-5 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>';
                this.classList.replace('bg-gray-900', 'bg-green-700');
                
                setTimeout(() => {
                    this.innerHTML = originalContent;
                    this.classList.replace('bg-green-700', 'bg-gray-900');
                    this.disabled = false;
                }, 2000);
                
                // Dispatch Custom Event for Cart Badge
                if (data.cart) {
                    let count = Object.keys(data.cart).length;
                    window.dispatchEvent(new CustomEvent('cart-updated', { detail: { count: count } }));
                }

                // Show Success Toast
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
});
</script>

@endsection
