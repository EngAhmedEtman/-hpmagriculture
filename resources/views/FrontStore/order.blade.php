@extends('FrontStore.layouts.app')
@section('title', 'إتمام الطلب - HPM Agriculture')

@section('content')
<main class="min-h-screen bg-gray-50 font-sans py-8 sm:py-12" x-data="checkoutForm()">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="max-w-7xl mx-auto">
            <!-- Compact Page Header -->
            <div class="text-center mb-8 animate-fade-in-down">
                <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight sm:text-3xl">إتمام الطلب</h1>
            </div>

            @if (session('success'))
                <div x-data="{ countdown: 5 }" x-init="
                        setInterval(() => countdown > 0 ? countdown-- : 0, 1000); 
                        setTimeout(() => window.location.href = '{{ route('home') }}', 5000);
                     " 
                     class="mb-6 p-4 rounded-xl bg-green-50 border border-green-200 flex items-start gap-3 text-green-700 animate-fade-in-down shadow-sm">
                    <svg class="h-6 w-6 flex-shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <p class="font-bold text-lg mb-1">{{ session('success') }}</p>
                        <p class="text-sm opacity-80">سيتم تحويلك للصفحة الرئيسية تلقائياً خلال <span x-text="countdown" class="font-bold"></span> ثواني...</p>
                    </div>
                </div>
            @endif

            <form action="{{ route('submitOrder') }}" method="post" class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                @csrf
                
                <!-- Order Form - Compact Layout -->
                <div class="lg:col-span-8 animate-fade-in-up">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <!-- Header Strip -->
                        <div class="bg-gray-50 px-6 py-4 border-b border-gray-100 flex items-center gap-3">
                            <span class="flex items-center justify-center w-8 h-8 rounded-full bg-green-600 text-white text-sm font-bold shadow-sm">1</span>
                            <h3 class="text-lg font-bold text-gray-800">بيانات الشحن والتوصيل</h3>
                        </div>
                        
                        <div class="p-6 sm:p-8">
                            <!-- Compact Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                                
                                <!-- Full Name -->
                                <div class="lg:col-span-3">
                                    <label class="block text-sm font-bold text-gray-700 mb-2">الاسم بالكامل <span class="text-red-500">*</span></label>
                                    <div class="relative group">
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-green-600 transition-colors">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        </div>
                                        <input type="text" name="fullName" required class="block w-full pr-10 pl-4 border-gray-200 rounded-lg focus:ring-green-500 focus:border-green-500 transition-all py-2.5 bg-gray-50 focus:bg-white text-gray-900" placeholder="الاسم ثلاثي">
                                    </div>
                                </div>

                                <!-- Phone -->
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">رقم الهاتف <span class="text-red-500">*</span></label>
                                    <div class="relative group">
                                         <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-green-600 transition-colors">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                        </div>
                                        <input type="tel" name="phone" required class="block w-full pr-10 pl-4 border-gray-200 rounded-lg focus:ring-green-500 focus:border-green-500 transition-all py-2.5 bg-gray-50 focus:bg-white text-gray-900" placeholder="01xxxxxxxxx">
                                    </div>
                                </div>

                                <!-- Phone 2 -->
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">رقم آخر <span class="text-gray-400 font-normal text-xs">(اختياري)</span></label>
                                    <div class="relative group">
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-green-600 transition-colors">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                        </div>
                                        <input type="tel" name="phone2" class="block w-full pr-10 pl-4 border-gray-200 rounded-lg focus:ring-green-500 focus:border-green-500 transition-all py-2.5 bg-gray-50 focus:bg-white text-gray-900" placeholder="رقم بديل">
                                    </div>
                                </div>

                                <!-- Email -->
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">البريد الإلكتروني <span class="text-gray-400 font-normal text-xs">(اختياري)</span></label>
                                    <div class="relative group">
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-green-600 transition-colors">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                        </div>
                                        <input type="email" name="email" class="block w-full pr-10 pl-4 border-gray-200 rounded-lg focus:ring-green-500 focus:border-green-500 transition-all py-2.5 bg-gray-50 focus:bg-white text-gray-900" placeholder="email@example.com">
                                    </div>
                                </div>

                                <!-- Government -->
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">المحافظة <span class="text-red-500">*</span></label>
                                    <div class="relative group">
                                         <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-green-600 transition-colors">
                                             <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                        </div>
                                        <select x-model="selectedGov" @change="updateCities()" name="government" required class="block w-full pr-10 pl-8 border-gray-200 rounded-lg focus:ring-green-500 focus:border-green-500 transition-all py-2.5 bg-gray-50 focus:bg-white text-gray-900 appearance-none">
                                            <option value="" disabled selected>اختر المحافظة</option>
                                            <template x-for="gov in Object.keys(governorates)" :key="gov">
                                                <option :value="gov" x-text="gov"></option>
                                            </template>
                                        </select>
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                        </div>
                                    </div>
                                </div>

                                <!-- City (Dynamic) -->
                                <div class="md:col-span-2 lg:col-span-2">
                                    <label class="block text-sm font-bold text-gray-700 mb-2">المدينة / المركز <span class="text-red-500">*</span></label>
                                    <div class="relative group">
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-green-600 transition-colors">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                        </div>
                                        <select name="city" required :disabled="!selectedGov" class="block w-full pr-10 pl-8 border-gray-200 rounded-lg focus:ring-green-500 focus:border-green-500 transition-all py-2.5 bg-gray-50 focus:bg-white text-gray-900 appearance-none disabled:bg-gray-100 disabled:text-gray-400">
                                            <option value="" disabled selected>اختر المركز / الحي</option>
                                            <template x-for="city in availableCities" :key="city">
                                                <option :value="city" x-text="city"></option>
                                            </template>
                                        </select>
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                        </div>
                                    </div>
                                </div>

                                 <!-- Address -->
                                 <div class="lg:col-span-3">
                                    <label class="block text-sm font-bold text-gray-700 mb-2">العنوان التفصيلي <span class="text-red-500">*</span></label>
                                    <div class="relative group">
                                        <div class="absolute top-3 right-0 pr-3 flex pointer-events-none text-gray-400 group-focus-within:text-green-600 transition-colors">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                        </div>
                                        <input type="text" name="address" required class="block w-full pr-10 pl-4 border-gray-200 rounded-lg focus:ring-green-500 focus:border-green-500 transition-all py-2.5 bg-gray-50 focus:bg-white text-gray-900" placeholder="اسم الشارع، رقم العقار، رقم الشقة، علامة مميزة...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary & Submit -->
                <div class="lg:col-span-4 space-y-6 animate-fade-in-left">
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 lg:sticky lg:top-8">
                         <h3 class="text-lg font-bold text-gray-900 mb-6 border-b border-gray-100 pb-4 flex items-center gap-2">
                             <span class="flex items-center justify-center w-8 h-8 rounded-full bg-green-600 text-white text-sm font-bold shadow-sm">2</span>
                             ملخص الدفع
                        </h3>

                        <div class="space-y-4 mb-6">
                            <div class="flex justify-between items-center text-gray-600 text-sm">
                                <span>قيمة المشتريات</span>
                                <span class="font-bold text-gray-900">{{ number_format((float)$totalPrice) }} جنيه</span>
                            </div>
                            <div class="flex justify-between items-center text-gray-600 text-sm">
                                <span>الشحن</span>
                                <span class="text-green-600 text-xs bg-green-50 px-2 py-1 rounded-md font-bold">يحدد لاحقاً</span>
                            </div>
                             <div class="border-t border-dashed border-gray-200 my-2"></div>
                            <div class="flex justify-between items-center bg-gray-50 p-3 rounded-lg">
                                <span class="text-base font-bold text-gray-900">الإجمالي النهائي</span>
                                <span class="text-xl font-black text-green-600">{{ number_format((float)$totalPrice) }} <span class="text-xs font-normal text-gray-500">ج.م</span></span>
                            </div>
                        </div>
                        
                        <input type="hidden" name="totalPrice" value="{{ $totalPrice }}">

                        <button type="submit" class="w-full bg-green-600 text-white py-3.5 rounded-xl font-bold text-lg shadow-lg shadow-green-200 hover:shadow-green-300 hover:bg-green-700 hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-center gap-2 group">
                            <span>تأكيد الطلب الآن</span>
                            <svg class="w-5 h-5 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</main>

<script>
    function checkoutForm() {
        return {
            selectedGov: '',
            availableCities: [],
            governorates: {
                'القاهرة': ['مدينة نصر', 'مصر الجديدة', 'المعادي', 'الزمالك', 'وسط البلد', 'التجمع الخامس', 'الرحاب', 'مدينتي', 'الشروق', 'المقطم', 'شبرا', 'عين شمس', 'المرج', 'حلوان', '15 مايو'],
                'الجيزة': ['الدقي', 'المهندسين', 'العجوزة', '6 أكتوبر', 'الشيخ زايد', 'الهرم', 'فيصل', 'إمبابة', 'الوراق', 'بولاق الدكرور', 'أوسيم', 'الحوامدية', 'البدرشين', 'العياط', 'الصف'],
                'الإسكندرية': ['سموحة', 'ميامي', 'المنتزه', 'سيدي جابر', 'رشدي', 'كفر عبده', 'محطة الرمل', 'المنشية', 'العجمي', 'العامرية', 'برج العرب', 'سبورتنج', 'جليم', 'لوران', 'أبو قير'],
                'الدقهلية': ['المنصورة', 'طلخا', 'ميت غمر', 'السنبلاوين', 'دكرنس', 'بلقاس', 'أجا', 'شربين', 'المطرية', 'المنزلة', 'جمصة', 'نبروه', 'بني عبيد'],
                'الشرقية': ['الزقازيق', 'العشر من رمضان', 'بلبيس', 'منيا القمح', 'أبو حماد', 'فاقوس', 'الحسينية', 'ههيا', 'أبو كبير', 'كفر صقر', 'مشتول السوق', 'ديرب نجم', 'الإبراهيمية'],
                'الغربية': ['طنطا', 'المحلة الكبرى', 'كفر الزيات', 'زفتى', 'السنطة', 'قطور', 'بسيون', 'سمنود'],
                'المنوفية': ['شبين الكوم', 'مدينة السادات', 'منوف', 'أشمون', 'تلا', 'الباجور', 'قويسنا', 'بركة السبع', 'سرس الليان', 'الشهداء'],
                'البحيرة': ['دمنهور', 'كفر الدوار', 'إيتاي البارود', 'رشيد', 'أبو حمص', 'الدلنجات', 'كوم حمادة', 'حوش عيسى', 'المحمودية', 'الرحمانية', 'شبراخيت', 'النوبارية', 'وادي النطرون'],
                'كفر الشيخ': ['كفر الشيخ', 'دسوق', 'فوه', 'مطوبس', 'بيلا', 'الحامول', 'الرياض', 'قلين', 'سيدي سالم', 'البرلس', 'بلطيم'],
                'دمياط': ['دمياط', 'دمياط الجديدة', 'رأس البر', 'فارسكور', 'كفر سعد', 'الزرقا', 'كفر البطيخ'],
                'بورسعيد': ['حي الشرق', 'حي العرب', 'حي المناخ', 'حي الضواحي', 'حي الزهور', 'بورفؤاد'],
                'الإسماعيلية': ['الإسماعيلية', 'التل الكبير', 'فايد', 'القنطرة شرق', 'القنطرة غرب', 'أبوصوير', 'القصاصين'],
                'السويس': ['السويس', 'الأربعين', 'عتاقة', 'فيصل', 'الجناين'],
                'بني سويف': ['بني سويف', 'الواسطى', 'ناصر', 'اهناسيا', 'ببا', 'سمسطا', 'الفشن', 'بني سويف الجديدة'],
                'الفيوم': ['الفيوم', 'الفيوم الجديدة', 'سنورس', 'إطسا', 'طامية', 'أبشواي', 'يوسف الصديق'],
                'المنيا': ['المنيا', 'المنيا الجديدة', 'بني مزار', 'مغاغة', 'العدوة', 'سمالوط', 'مطاي', 'أبو قرقاص', 'ملوي', 'دير مواس'],
                'أسيوط': ['أسيوط', 'أسيوط الجديدة', 'ديروط', 'القوصية', 'أبنوب', 'منفلوط', 'الفتح', 'أبو تيج', 'الغنايم', 'ساحل سليم', 'البداري', 'صدفا'],
                'سوهاج': ['سوهاج', 'سوهاج الجديدة', 'أخميم', 'الكوثر', 'المراغة', 'البلينا', 'جرجا', 'طما', 'طهطا', 'ساقلتة', 'المنشأة', 'دار السلام', 'جهينة'],
                'قنا': ['قنا', 'قنا الجديدة', 'أبو تشت', 'فرشوط', 'نجع حمادي', 'دشنا', 'الوقف', 'قفط', 'قوص', 'نقادة'],
                'الأقصر': ['الأقصر', 'إسنا', 'أرمنت', 'طيبة', 'البياضية', 'القرنة', 'الزينية'],
                'أسوان': ['أسوان', 'أسوان الجديدة', 'كوم أمبو', 'دراو', 'إدفو', 'نصر النوبة'],
                'البحر الأحمر': ['الغردقة', 'سفاجا', 'القصير', 'مرسى علم', 'رأس غارب', 'حلايب', 'شلاتين'],
                'الوادي الجديد': ['الخارجة', 'الداخلة', 'الفرافرة', 'باريس', 'بلاط'],
                'مطروح': ['مرسى مطروح', 'العلمين', 'الضبعة', 'الحمام', 'سيوة', 'النجيلة', 'براني', 'السلوم'],
                'شمال سيناء': ['العريش', 'الشيخ زويد', 'رفح', 'بئر العبد', 'الحسنة', 'نخل'],
                'جنوب سيناء': ['الطور', 'شرم الشيخ', 'دهب', 'نويبع', 'طابا', 'سانت كاترين', 'رأس سدر', 'أبو رديس']
            },
            updateCities() {
                if (this.selectedGov && this.governorates[this.selectedGov]) {
                    this.availableCities = this.governorates[this.selectedGov].sort();
                } else {
                    this.availableCities = [];
                }
            }
        }
    }
</script>
@endsection


