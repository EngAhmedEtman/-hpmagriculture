@extends('FrontStore.layouts.app')
@section('title', 'الأسئلة الشائعة - Hpm للأسمدة والكيماويات')
@section('content')

    <main>
        <section class="featured-products">
            <div class="container">
                <h2 class="page-title">الأسئلة الشائعة</h2>

                <div class="product-grid">
                    @if(!$faqs->isEmpty())
                        @foreach($faqs as $faq)
                            <div class="product-card">
                                <div class="product-info">
                                    <h4>{{ $faq->question }}</h4>
                                    <p>{{ $faq->answer }}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>لا توجد أسئلة شائعة متاحة حالياً.</p>
                    @endif
                </div>
            </div>
        </section>
    </main>

@endsection('content')
