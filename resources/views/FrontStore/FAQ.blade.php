@extends('FrontStore.layouts.app')
@section('title', 'الأسئلة الشائعة - HPM Agriculture')

@section('content')
<div class="bg-gray-100 min-h-screen py-16">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16 animate-fade-in-down">
            <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl mb-4">الأسئلة الشائعة</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                إليك إجابات لأكثر الأسئلة تكراراً حول منتجاتنا وخدماتنا. نهدف لتوفير كل المعلومات التي تحتاجها.
            </p>
        </div>

        <div class="space-y-4" x-data="{ activeAccordion: null }">
            @if(!$faqs->isEmpty())
                @foreach($faqs as $index => $faq)
                    <div class="bg-white rounded-2xl shadow-md border border-gray-200 overflow-hidden transition-all duration-300 hover:shadow-lg animate-fade-in-up" 
                         style="animation-delay: {{ $index * 100 }}ms">
                        
                        <button 
                            @click="activeAccordion = activeAccordion === {{ $faq->id }} ? null : {{ $faq->id }}"
                            class="w-full px-6 py-5 text-right flex items-center justify-between focus:outline-none group bg-white hover:bg-gray-50 transition-colors"
                        >
                            <span class="text-lg font-bold text-gray-800 group-hover:text-green-700 transition-colors pr-2 border-r-4 border-transparent group-hover:border-green-500">
                                {{ $faq->question }}
                            </span>
                            <span class="ml-2 transform transition-transform duration-300 text-gray-400 group-hover:text-green-600"
                                  :class="{ 'rotate-180': activeAccordion === {{ $faq->id }} }">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </span>
                        </button>

                        <div 
                            x-show="activeAccordion === {{ $faq->id }}" 
                            x-collapse 
                            x-cloak
                            class="bg-gray-50/50"
                        >
                            <div class="px-6 pb-6 pt-2 text-gray-600 leading-relaxed border-t border-gray-100 mr-2">
                                {{ $faq->answer }}
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center py-12 bg-white rounded-2xl shadow-sm border border-gray-100">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p class="text-gray-500 text-lg">لا توجد أسئلة شائعة مضافة حالياً.</p>
                </div>
            @endif
        </div>

        <div class="mt-12 text-center animate-fade-in-up" style="animation-delay: 400ms">
            <p class="text-gray-600 mb-4">لم تجد إجابة لسؤالك؟</p>
            <a href="{{ route('contactForm') }}" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-bold rounded-xl text-white bg-green-600 hover:bg-green-700 md:py-3 md:text-lg md:px-10 shadow-lg hover:shadow-green-200 transition-all duration-300">
                تواصل معنا الآن
            </a>
        </div>
    </div>
</div>
@endsection
