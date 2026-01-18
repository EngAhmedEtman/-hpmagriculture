<footer class="bg-gray-900 text-gray-300 py-12 border-t border-gray-800 font-sans mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- About Section -->
            <div class="space-y-4">
                <img src="{{ asset('storage/logo/logo.png') }}" alt="Logo" class="h-16 w-auto opacity-90 grayscale-0 brightness-200">
                <p class="text-sm leading-relaxed text-gray-400">
                    نحن نسعى لتقديم أفضل المنتجات الزراعية التي تساهم في تحسين جودة المحاصيل وزيادة الإنتاجية.
                </p>
                <div class="flex space-x-reverse space-x-4 pt-2">
                    <a href="https://www.facebook.com/profile.php?id=61556984747775" target="_blank" class="text-gray-400 hover:text-white transition-colors">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="https://wa.me/201031948659" target="_blank" class="text-gray-400 hover:text-white transition-colors">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-white text-lg font-bold mb-4 border-b border-green-600 inline-block pb-2">روابط سريعة</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="hover:text-green-500 transition-colors flex items-center gap-2"><span class="text-green-600">&lsaquo;</span> الرئيسية</a></li>
                    <li><a href="{{ route('storeProducts') }}" class="hover:text-green-500 transition-colors flex items-center gap-2"><span class="text-green-600">&lsaquo;</span> المنتجات</a></li>
                    <li><a href="{{ route('aboutUs') }}" class="hover:text-green-500 transition-colors flex items-center gap-2"><span class="text-green-600">&lsaquo;</span> من نحن</a></li>
                    <li><a href="{{ route('contactForm') }}" class="hover:text-green-500 transition-colors flex items-center gap-2"><span class="text-green-600">&lsaquo;</span> تواصل معنا</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-white text-lg font-bold mb-4 border-b border-green-600 inline-block pb-2">تواصل معنا</h3>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3 group">
                        <div class="bg-gray-800 p-2 rounded-lg group-hover:bg-green-600 transition-colors">
                            <svg class="w-5 h-5 text-green-500 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <span class="text-sm mt-1">جمهورية مصر العربية، البحيرة</span>
                    </li>
                    <li class="flex items-center gap-3 group">
                        <div class="bg-gray-800 p-2 rounded-lg group-hover:bg-green-600 transition-colors">
                             <svg class="w-5 h-5 text-green-500 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <a href="mailto:info@hpm.com" class="hover:text-white text-sm">info@hpm.com</a>
                    </li>
                    <li class="flex items-center gap-3 group">
                        <div class="bg-gray-800 p-2 rounded-lg group-hover:bg-green-600 transition-colors">
                            <svg class="w-5 h-5 text-green-500 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <span dir="ltr" class="text-sm">+20 103 194 8659</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-12 pt-8 text-center text-sm text-gray-500">
            <p>&copy; {{ date('Y') }} HPM Agriculture. جميع الحقوق محفوظة.</p>
        </div>
    </div>
    <!-- Floating WhatsApp Button -->
    <div class="fixed bottom-6 right-6 z-50 group">
        <!-- Pulse Effect -->
        <div class="absolute inset-0 bg-green-400 rounded-full animate-ping opacity-75 group-hover:opacity-100"></div>
        
        <!-- Button -->
        <a href="https://wa.me/201031948659" target="_blank" class="relative flex items-center justify-center w-16 h-16 bg-green-500 rounded-full shadow-2xl hover:bg-green-600 transition-all duration-300 transform hover:scale-110 hover:-translate-y-1 focus:outline-none focus:ring-4 focus:ring-green-300">
            <svg class="w-9 h-9 text-white fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.789-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
            </svg>
        </a>
    </div>
</footer>
