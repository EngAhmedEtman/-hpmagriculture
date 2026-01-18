<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('adminDashboard.users.index',compact('users'));

    }

    public function edit($id)
    {
        $user = User::where('id',$id)->first();
        return view('adminDashboard.users.edit',compact('user'));
    }

public function create()
{
    if (!Auth::user()?->is_superadmin) {
        abort(403, 'ليس لديك صلاحية لإنشاء مستخدمين جدد');
    }

    return view('adminDashboard.users.create');
}


public function store(Request $request)
{
    // التأكد من تسجيل الدخول وأن المستخدم superadmin
    abort_unless(Auth::check() && Auth::user()->is_superadmin, 403, 'ليس لديك صلاحية لإنشاء مستخدمين جدد');

    // التحقق من البيانات
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
    ]);

    // إنشاء المستخدم الجديد
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    return redirect()->route('users.index')->with('message', 'تم إنشاء المستخدم بنجاح');
}


public function update(Request $request, User $user)
{
    // تحقق إن المستخدم الحالي Super Admin
    if (!auth()->user()->is_superadmin) {
        abort(403, 'ليس لديك صلاحية تعديل المستخدمين');
    }

    // Validation
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'is_superadmin' => 'nullable|boolean', // حقل السوبر أدمن
        'password' => 'nullable|string|min:6|confirmed', // الباسورد جديد (اختياري)
    ]);

    // تحضير البيانات للتحديث
    $data = [
        'name' => $request->name,
        'email'=> $request->email,
        'is_superadmin' => $request->has('is_superadmin') ? $request->is_superadmin : 0,
    ];

    // تحديث الباسورد إذا تم إدخاله
    if ($request->filled('password')) {
        $data['password'] = bcrypt($request->password);
    }

    // تحديث المستخدم
    $user->update($data);

    return redirect()->route('users.index')->with('success', 'تم تعديل المستخدم بنجاح');
}


    
    
    

public function destroy(User $user)
{
    // 1️⃣ التأكد إن اللي بيحذف سوبر أدمن
    if (!Auth::check() || !Auth::user()->is_superadmin) {
        abort(403, 'غير مصرح لك بتنفيذ هذا الإجراء');
    }

    // 2️⃣ منع حذف النفس
    if ($user->id === Auth::id()) {
        return redirect()->back()
            ->withErrors('لا يمكنك حذف حسابك الشخصي');
    }

    // 3️⃣ منع حذف أي سوبر أدمن آخر
    if ($user->is_superadmin) {
        return redirect()->back()
            ->withErrors('لا يمكن حذف مشرف رئيسي');
    }

    // 4️⃣ تنفيذ الحذف
    $user->delete();

    return redirect()->route('users.index')
        ->with('message', 'تم حذف المستخدم بنجاح');
}



}
