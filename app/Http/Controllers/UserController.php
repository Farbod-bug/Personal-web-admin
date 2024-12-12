<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(8);

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'access_level' => 'required|in:0,1',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'access_level' => $request->access_level,
        ]);

        return redirect()->route('users.index')->with('success', 'ادیمن با موفقیت ایجاد شد!');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'access_level' => 'required|in:0,1',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'access_level' => $request->access_level,
        ]);

        return redirect()->route('users.index')->with('success', 'اطلاعات ادمین با موفقیت ویرایش شد');
    }

    public function editPass(User $user)
    {
        return view('users.editPass', compact('user'));
    }

    public function updatePass(User $user, Request $request)
    {
        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|min:8',
            'comfirmedPass' => 'required|same:newPassword',
        ]);

        if (!Hash::check($request->oldPassword, $user->password)) {
            return back()->withErrors(['oldPassword' => 'رمز عبور قبلی نادرست است.'])->withInput();
        }

        $user->password = Hash::make($request->newPassword);
        $user->save();

        return redirect()->route('users.index')->with('success', 'رمز عبور با موفقیت تغییر کرد!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('warning', 'ادمین با موفقیت حذف شد');
    }
}
