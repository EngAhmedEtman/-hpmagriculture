<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <!-- شعار الموقع -->
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{ url('/' . ($page = 'dashboard')) }}">
            <img src="{{ asset('assets/img/logo2.png') }}" class="main-logo" alt="logo">
        </a>
        <a class="desktop-logo logo-dark active" href="{{ url('/' . ($page = 'dashboard')) }}">
            <img src="{{ asset('assets/img/logo2.png') }}" class="main-logo dark-theme" alt="logo">
        </a>
        <a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . ($page = 'dashboard')) }}">
            <img src="{{ asset('assets/img/logo2.png') }}" class="logo-icon" alt="logo">
        </a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . ($page = 'dashboard')) }}">
            <img src="{{ asset('assets/img/logo2.png') }}" class="logo-icon dark-theme" alt="logo">
        </a>
    </div>

    <!-- معلومات المستخدم -->
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround user-avatar"
                        src="{{ asset('assets/img/default-avatar.png') }}">
                    <span class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{ Auth::user()->name }}</h4>
                    <span class="mb-0 text-muted">{{ Auth::user()->email }}</span>
                </div>
            </div>
        </div>

        <!-- القائمة الجانبية -->
        <ul class="side-menu">

            <!-- الرئيسية -->
            <li class="side-item side-item-category">الرئيسية</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . ($page = 'dashboard')) }}">
                    <i class="fas fa-home side-menu__icon"></i>
                    <span class="side-menu__label">الرئيسية</span>
                </a>
            </li>

            <!-- المنتجات -->
            <li class="side-item side-item-category">المنتجات</li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '')) }}">
                    <i class="fas fa-box side-menu__icon"></i>
                    <span class="side-menu__label">المنتجات</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="{{ route('products.index') }}">
                            <i class="fas fa-list-ul ml-2"></i> قائمة المنتجات
                        </a>
                    </li>
                    <li>
                        <a class="slide-item" href="{{ route('products.create') }}">
                            <i class="fas fa-plus ml-2"></i> إضافة منتج
                        </a>
                    </li>
                </ul>
            </li>

            <!-- التصنيفات -->
            <li class="side-item side-item-category">التصنيفات</li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                    <i class="fas fa-tags side-menu__icon"></i>
                    <span class="side-menu__label">التصنيفات</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="{{ route('categories.index') }}">
                            <i class="fas fa-list ml-2"></i> قائمة التصنيفات
                        </a>
                    </li>
                    <li>
                        <a class="slide-item" href="{{ route('categories.create') }}">
                            <i class="fas fa-plus ml-2"></i> إضافة تصنيف
                        </a>
                    </li>
                </ul>
            </li>


            <!-- عنوان قسم الطلبات -->
            <li class="side-item side-item-category">الطلبات</li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                    <i class="fas fa-shopping-cart side-menu__icon"></i>
                    <span class="side-menu__label">الطلبات</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="{{ route('orders.index') }}">
                            <i class="fas fa-list ml-2"></i> قائمة الطلبات
                        </a>
                    </li>
                    <li>
                        {{-- {{ route('orders.pending') }} --}}
                        <a class="slide-item" href="{{ route('orders.pending') }}">
                            <i class="fas fa-clock ml-2"></i> الطلبات المعلقة
                        </a>
                    </li>
                    <li>
                        {{-- {{ route('orders.delivered') }} --}}
                        <a class="slide-item" href="{{ route('orders.delivered') }}">
                            <i class="fas fa-clock ml-2"></i> الطلبات المكتملة
                        </a>
                    </li>
                    <li>
                        {{-- {{ route('orders.processing') }} --}}
                        <a class="slide-item" href="{{ route('orders.processing') }}">
                            <i class="fas fa-clock ml-2"></i> الطلبات قيد المعالجة
                        </a>
                    </li>
                    <li>
                        {{-- {{ route('orders.shipped') }} --}}
                        <a class="slide-item" href="{{ route('orders.shipped') }}">
                            <i class="fas fa-clock ml-2"></i> الطلبات المشحونة
                        </a>
                    </li>
                    <li>
                        {{-- {{ route('orders.cancelled') }} --}}
                        <a class="slide-item" href="{{ route('orders.cancelled') }}">
                            <i class="fas fa-clock ml-2"></i> الطلبات الملغية

                        </a>
                    </li>
                </ul>
            </li>

            <!-- المستخدمين -->
            <li class="side-item side-item-category">المستخدمين</li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                    <i class="fas fa-users side-menu__icon"></i>
                    <span class="side-menu__label">المستخدمين</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="{{ route('users.index') }}">
                            <i class="fas fa-list ml-2"></i> قائمة المستخدمين
                        </a>
                    </li>
                </ul>
            </li>

            <!-- الإعدادات -->
            <li class="side-item side-item-category">الإعدادات</li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                    <i class="fas fa-cogs side-menu__icon"></i>
                    <span class="side-menu__label">الإعدادات</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="{{ route('faqs.index') }}">
                            <i class="fas fa-th-list ml-2"></i> الاسئلة الشائعة
                        </a>
                    </li>
                    <li>
                        <a class="slide-item" href="{{ route('messages.index') }}">
                            <i class="fas fa-box ml-2"></i> الرسائل
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</aside>
<!-- main-sidebar -->

<!-- CSS لضبط حجم الأيقونات -->
<style>
    .side-menu__icon {
        font-size: 20px;
        width: 24px;
        text-align: center;
        margin-right: 10px;
    }
</style>
