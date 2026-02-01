<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (auth()->check() && auth()->user()->email !== 'admin@gmail.com') {
                return redirect('/'); 
            }
            return $next($request);
        });
    }
    public function index()
    {
        // semua data user, urutkan dari yang terbaru
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.users.index', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // admin tidak bisa menghapus akun admin
        if ($user->email == 'admin@gmail.com') {
            return back()->with('error', 'Anda tidak bisa menghapus Akun Admin!');
        }

        $user->delete();
        return back()->with('success', 'User berhasil dihapus!');
    }
}