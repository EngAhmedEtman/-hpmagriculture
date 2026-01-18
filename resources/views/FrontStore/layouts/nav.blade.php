@php
    use App\Models\Category;
    $categories = Category::where('is_active', true)->get();
@endphp

<nav x-data="{ mobileMenuOpen: false, categoryDropdownOpen: false }" class="bg-white shadow-lg sticky top-0 z-[100] font-sans">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <!-- Logo Section -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <img class="h-14 w-auto object-contain transition-transform hover:scale-105" src="{{ asset('storage/logo/logo.png') }}" alt="Logo">
                    {{-- <span class="font-bold text-xl text-green-700 hidden md:block">HPM Agriculture</span> --}}
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex md:items-center md:space-x-reverse md:space-x-8">
                <a href="{{ route('home') }}" 
                   class="text-gray-700 hover:text-green-600 px-3 py-2 rounded-md text-base font-medium transition-colors {{ request()->routeIs('home') ? 'text-green-600 font-bold' : '' }}">
                   الرئيسية
                </a>

                <a href="{{ route('storeProducts') }}" 
                   class="text-gray-700 hover:text-green-600 px-3 py-2 rounded-md text-base font-medium transition-colors {{ request()->routeIs('storeProducts') ? 'text-green-600 font-bold' : '' }}">
                   المنتجات
                </a>

                <!-- Dropdown -->
                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="text-gray-700 hover:text-green-600 group inline-flex items-center px-3 py-2 rounded-md text-base font-medium transition-colors focus:outline-none">
                        <span>التصنيفات</span>
                        <svg class="mr-1 h-5 w-5 text-gray-500 group-hover:text-green-600 transition-transform duration-200" :class="{'rotate-180': open}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-1"
                         class="absolute z-50 -right-4 mt-0 w-56 rounded-md shadow-xl bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
                        <div class="py-1 relative grid gap-1 bg-white p-2">
                             @foreach($categories as $category)
                                <a href="{{ route('showProductsByCategory', $category->id) }}" class="block px-4 py-3 rounded-md text-sm text-gray-700 hover:bg-green-50 hover:text-green-700 transition-colors">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <a href="{{ route('contactForm') }}" class="text-gray-700 hover:text-green-600 px-3 py-2 rounded-md text-base font-medium transition-colors">تواصل معنا</a>
                <a href="{{ route('aboutUs') }}" class="text-gray-700 hover:text-green-600 px-3 py-2 rounded-md text-base font-medium transition-colors">من نحن</a>
            </div>

            <!-- Actions (Cart) -->
            <div class="hidden md:flex items-center space-x-reverse space-x-4">
                <a href="{{ route('cart.index') }}" class="relative p-2 text-gray-600 hover:text-green-600 transition-colors">
                    <span class="sr-only">السلة</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <!-- Badge can be added here if cart count is available -->
                </a>
                
                {{-- <a href="#" class="btn primary-btn text-sm px-5 py-2">تسجيل الدخول</a> --}}
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center md:hidden">
                <a href="{{ route('cart.index') }}" class="p-2 text-gray-600 hover:text-green-600 transition-colors ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </a>
                <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-green-500" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-7 w-7" :class="{'hidden': mobileMenuOpen, 'block': !mobileMenuOpen }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="h-7 w-7" :class="{'block': mobileMenuOpen, 'hidden': !mobileMenuOpen }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0" 
         class="md:hidden bg-white border-t border-gray-100" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50">الرئيسية</a>
            <a href="{{ route('storeProducts') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50">المنتجات</a>
            
            <div x-data="{ expanded: false }">
                <button @click="expanded = !expanded" class="flex w-full items-center justify-between px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50">
                    <span>التصنيفات</span>
                    <svg class="h-5 w-5 transform transition-transform" :class="{'rotate-180': expanded}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div x-show="expanded" class="space-y-1 pr-4">
                     @foreach($categories as $category)
                        <a href="{{ route('showProductsByCategory', $category->id) }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-green-600 hover:bg-green-50">
                             - {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <a href="{{ route('contactForm') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50">تواصل معنا</a>
            <a href="{{ route('aboutUs') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50">من نحن</a>
            <a href="{{ route('faqs') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50">الأسئلة الشائعة</a>
        </div>
    </div>
</nav>
