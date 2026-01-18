@extends('FrontStore.layouts.app')
@section('title', 'تواصل معنا - HPM Agriculture')

@section('content')
<main class="min-h-screen bg-gray-100 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
    
    <!-- Decorative Background Elements -->
    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-72 h-72 bg-green-200 rounded-full mix-blend-multiply filter blur-2xl opacity-30 animate-blob"></div>
    <div class="absolute top-0 left-0 -ml-20 -mt-20 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-2xl opacity-30 animate-blob animation-delay-2000"></div>
    <div class="absolute bottom-0 left-20 -mb-20 w-72 h-72 bg-yellow-200 rounded-full mix-blend-multiply filter blur-2xl opacity-30 animate-blob animation-delay-4000"></div>

    <div class="max-w-6xl w-full relative z-10" x-data="contactForm()">
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden grid grid-cols-1 lg:grid-cols-5 min-h-[600px] border border-gray-200">
            
            <!-- Contact Info Sidebar (Dark/Brand Theme) -->
            <div class="lg:col-span-2 bg-gradient-to-br from-green-900 to-green-800 text-white p-10 flex flex-col justify-between relative overflow-hidden">
                <!-- Decorative Circles -->
                <div class="absolute top-10 right-10 w-20 h-20 bg-green-500 rounded-full mix-blend-overlay filter blur-xl opacity-20"></div>
                <div class="absolute bottom-10 left-10 w-32 h-32 bg-green-400 rounded-full mix-blend-overlay filter blur-xl opacity-20"></div>
                
                <div class="relative z-10">
                    <h2 class="text-3xl font-extrabold tracking-tight mb-6 animate-fade-in-down">تواصل معنا</h2>
                    <p class="text-green-100 mb-10 leading-relaxed text-lg animate-fade-in-up">
                        نحن هنا لمساعدتك. إذا كان لديك أي استفسار حول منتجاتنا أو خدماتنا، لا تتردد في الاتصال بنا.
                    </p>
                    
                    <div class="space-y-8 animate-fade-in-up animation-delay-300">
                        <div class="flex items-start gap-4">
                            <div class="bg-white/10 p-3 rounded-xl backdrop-blur-sm shrink-0">
                                <svg class="w-6 h-6 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg">اتصل بنا</h3>
                                <p class="text-green-100 mt-1" dir="ltr">+20 103 194 8659</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                             <div class="bg-white/10 p-3 rounded-xl backdrop-blur-sm shrink-0">
                                <svg class="w-6 h-6 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg">البريد الإلكتروني</h3>
                                <p class="text-green-100 mt-1 font-sans">official@hpmagriculture.com</p>
                            </div>
                        </div>

                         <div class="flex items-start gap-4">
                             <div class="bg-white/10 p-3 rounded-xl backdrop-blur-sm shrink-0">
                                <svg class="w-6 h-6 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg">مقرنا</h3>
                                <p class="text-green-100 mt-1">القاهرة، مدينة نصر، شارع الطيران 44</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Links -->
                <div class="relative z-10 mt-12 flex gap-4 animate-fade-in-up animation-delay-500">
                    <a href="https://www.facebook.com/profile.php?id=61556984747775" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-white/10 backdrop-blur-sm flex items-center justify-center hover:bg-white hover:text-green-800 transition-all duration-300 transform hover:-translate-y-1">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="https://wa.me/201031948659" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-white/10 backdrop-blur-sm flex items-center justify-center hover:bg-white hover:text-green-800 transition-all duration-300 transform hover:-translate-y-1">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Contact Form Area -->
            <div class="lg:col-span-3 bg-white p-10 lg:p-14 relative">
                 <h2 class="text-2xl font-bold text-gray-800 mb-8 animate-fade-in-down">راسلنا الآن</h2>
                 
                <form @submit.prevent="submitForm" class="space-y-6">
                    @csrf
                    
                    <div class="space-y-6 animate-fade-in-up">
                        <!-- Name Field -->
                        <div class="relative group">
                            <input type="text" id="name" x-model="formData.name" required class="peer w-full h-14 bg-gray-50/50 rounded-xl px-4 pt-4 text-gray-900 placeholder-transparent border-2 border-transparent focus:border-green-500 focus:bg-white focus:outline-none transition-all duration-300" placeholder="الاسم الكامل" />
                            <label for="name" class="absolute right-4 top-4 text-gray-500 text-sm font-semibold transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-4 peer-focus:top-1 peer-focus:text-xs peer-focus:text-green-600 cursor-text pointer-events-none">الاسم الكامل</label>
                        </div>
                        
                        <!-- Phone Field -->
                        <div class="relative group">
                            <input type="tel" id="phone" x-model="formData.phone" required class="peer w-full h-14 bg-gray-50/50 rounded-xl px-4 pt-4 text-gray-900 placeholder-transparent border-2 border-transparent focus:border-green-500 focus:bg-white focus:outline-none transition-all duration-300" placeholder="رقم الهاتف" />
                            <label for="phone" class="absolute right-4 top-4 text-gray-500 text-sm font-semibold transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-4 peer-focus:top-1 peer-focus:text-xs peer-focus:text-green-600 cursor-text pointer-events-none">رقم الهاتف</label>
                        </div>
                        
                        <!-- Message Field -->
                        <div class="relative group">
                            <textarea id="message" x-model="formData.message" rows="4" required class="peer w-full bg-gray-50/50 rounded-xl px-4 pt-5 text-gray-900 placeholder-transparent border-2 border-transparent focus:border-green-500 focus:bg-white focus:outline-none transition-all duration-300 resize-none" placeholder="اكتب رسالتك هنا"></textarea>
                            <label for="message" class="absolute right-4 top-4 text-gray-500 text-sm font-semibold transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-5 peer-focus:top-1.5 peer-focus:text-xs peer-focus:text-green-600 cursor-text pointer-events-none">نص الرسالة</label>
                        </div>
                    </div>

                    <div class="pt-4 animate-fade-in-up animation-delay-200">
                        <button type="submit" :disabled="loading" class="w-full bg-green-600 text-white font-bold rounded-xl py-4 shadow-lg shadow-green-200 hover:shadow-green-300 hover:bg-green-700 hover:-translate-y-1 active:translate-y-0 transition-all duration-300 flex items-center justify-center gap-3 disabled:opacity-70 disabled:cursor-not-allowed group relative overflow-hidden">
                             <span class="relative z-10 flex items-center gap-2" x-show="!loading">
                                إرسال الرسالة
                                <svg class="w-5 h-5 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                             </span>
                             <span x-show="loading" class="flex items-center gap-2" style="display: none;">
                                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                جاري الإرسال...
                             </span>
                        </button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>

    <!-- Success Modal Overlay -->
    <div x-show="showSuccessModal" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-90"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-90"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm" 
         style="display: none;">
        
        <div class="bg-white rounded-3xl p-8 max-w-sm w-full text-center relative shadow-2xl animate-bounce-in">
            <button @click="showSuccessModal = false" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-green-600 animate-check" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
            </div>
            
            <h3 class="text-2xl font-bold text-gray-900 mb-2">تم الإرسال بنجاح!</h3>
            <p class="text-gray-500 mb-8">شكراً لتواصلك معنا. تم استلام رسالتك وسيقوم فريقنا بالرد عليك في أقرب وقت ممكن.</p>
            
            <button @click="showSuccessModal = false" class="w-full bg-green-600 text-white font-bold py-3 rounded-xl hover:bg-green-700 transition-colors shadow-lg shadow-green-200">
                حسناً، فهمت
            </button>
        </div>
    </div>

</main>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('contactForm', () => ({
            loading: false,
            showSuccessModal: false,
            formData: {
                name: '',
                phone: '',
                message: ''
            },
            async submitForm() {
                this.loading = true;
                
                try {
                    const response = await fetch('{{ route('submitContactForm') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                        },
                        body: JSON.stringify(this.formData)
                    });

                    const data = await response.json();

                    if (response.ok) {
                        this.showSuccessModal = true;
                        this.formData = { name: '', phone: '', message: '' }; // Reset form
                    } else {
                        // Handle validation errors if any (simple alert for now)
                        alert('حدث خطأ اثناء الارسال. يرجى التأكد من البيانات والمحاولة مرة أخرى.');
                    }
                } catch (error) {
                    console.error('Error:', error);
                    alert('حدث خطأ غير متوقع.');
                } finally {
                    this.loading = false;
                }
            }
        }))
    })
</script>

            </div>
            
        </div>
    </div>
</main>
@endsection
