<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;  // Jangan lupa import class Auth
use App\Models\User;  // Import model User untuk pendaftaran

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input dari user
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Cek apakah kredensial benar
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
                return redirect()->route('dashboard');
        
        }

        // Jika gagal login, kembali ke form login dengan pesan error
        return redirect()->route('login')->withErrors(['message' => 'Invalid credentials']);
    }
    

    // Proses logout
    public function logout()
    {
        // Logout pengguna
        Auth::logout();

        // Redirect ke halaman login setelah logout
        return redirect()->route('login');
    }

    // Menampilkan form registrasi
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        // Validasi input dari user
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6', // Password harus terkonfirmasi
        ]);

        // Buat user baru
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Enkripsi password
        $user->save();

        // Login user setelah registrasi
        Auth::login($user);

        // Redirect ke halaman login setelah registrasi sukses
        return redirect()->route('login');
    }
}
