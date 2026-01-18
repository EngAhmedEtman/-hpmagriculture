<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with statistics.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // إحصائيات الطلبات
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $processingOrders = Order::where('status', 'processing')->count();
        $shippedOrders = Order::where('status', 'shipped')->count();
        $deliveredOrders = Order::where('status', 'delivered')->count();
        $cancelledOrders = Order::where('status', 'cancelled')->count();

        // إحصائيات المبيعات
        $totalSales = Order::where('status', '!=', 'cancelled')->sum('total_price');
        $todaySales = Order::where('status', '!=', 'cancelled')
            ->whereDate('created_at', Carbon::today())
            ->sum('total_price');
        $thisMonthSales = Order::where('status', '!=', 'cancelled')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('total_price');
        $lastMonthSales = Order::where('status', '!=', 'cancelled')
            ->whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->whereYear('created_at', Carbon::now()->subMonth()->year)
            ->sum('total_price');

        // حساب النسبة المئوية للتغير
        $salesGrowth = $lastMonthSales > 0
            ? (($thisMonthSales - $lastMonthSales) / $lastMonthSales) * 100
            : 0;

        // إحصائيات المنتجات
        $totalProducts = Product::count();
        $activeProducts = Product::where('is_active', true)->count();
        $specialProducts = Product::where('is_special', true)->count();
        $lowStockProducts = Product::where('is_active', true)->count(); // يمكنك إضافة شرط المخزون

        // إحصائيات المستخدمين
        $totalUsers = User::count();
        $newUsersToday = User::whereDate('created_at', Carbon::today())->count();
        $newUsersThisMonth = User::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        // إحصائيات التصنيفات
        $totalCategories = Category::count();

        // آخر الطلبات (أحدث 5 طلبات)
        $recentOrders = Order::with(['orderItems.product'])
            ->latest()
            ->take(5)
            ->get();

        // أكثر المنتجات مبيعاً
        $topProducts = Product::withCount([
            'order__Items as total_sold' => function ($query) {
                $query->select(DB::raw('SUM(quantity)'));
            }
        ])
            ->orderBy('total_sold', 'desc')
            ->take(5)
            ->get();

        // إحصائيات المبيعات الشهرية (آخر 6 شهور)
        $monthlySales = [];
        $monthlyOrders = [];

        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $monthName = $date->locale('ar')->format('M');

            $sales = Order::where('status', '!=', 'cancelled')
                ->whereMonth('created_at', $date->month)
                ->whereYear('created_at', $date->year)
                ->sum('total_price');

            $orders = Order::whereMonth('created_at', $date->month)
                ->whereYear('created_at', $date->year)
                ->count();

            $monthlySales[$monthName] = $sales;
            $monthlyOrders[$monthName] = $orders;
        }

        // إحصائيات حسب المحافظة (أكثر 5 محافظات طلباً)
        $topGovernments = Order::select('customer_governoment', DB::raw('count(*) as total'))

            ->groupBy('customer_governoment')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            // إحصائيات الطلبات
            'totalOrders',
            'pendingOrders',
            'processingOrders',
            'shippedOrders',
            'deliveredOrders',
            'cancelledOrders',
            // إحصائيات المبيعات
            'totalSales',
            'todaySales',
            'thisMonthSales',
            'salesGrowth',
            // إحصائيات المنتجات
            'totalProducts',
            'activeProducts',
            'specialProducts',
            'lowStockProducts',
            // إحصائيات المستخدمين
            'totalUsers',
            'newUsersToday',
            'newUsersThisMonth',
            // إحصائيات التصنيفات
            'totalCategories',
            // البيانات التفصيلية
            'recentOrders',
            'topProducts',
            'monthlySales',
            'monthlyOrders',
            'topGovernments'
        ));
    }
}
