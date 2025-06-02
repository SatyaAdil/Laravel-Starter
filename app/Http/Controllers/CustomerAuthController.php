<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomerAuthController extends Controller
{
    // Menampilkan halaman login
    public function login()
    {
        return view('web.customer.login', [
            'title' => 'Login'
        ]);
    }

    // Menampilkan halaman register
    public function register()
    {
        return view('web.customer.register', [
            'title' => 'Register'
        ]);
    }

    // Proses register customer
    public function store_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'                  => 'required|max:255',
            'email'                 => 'required|email|max:255|unique:customers,email',
            'password'              => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('errorMessage', 'Validation Error, Please Check Your Input')
                ->withErrors($validator)
                ->withInput();
        }

        // Simpan data customer baru
        Customer::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('customer.login')
            ->with('successMessage', 'Registration Successful, Please Login');
    }

    // Proses login customer
    public function store_login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $validator = Validator::make($credentials, [
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('errorMessage', 'Validasi error, silahkan cek kembali data anda')
                ->withErrors($validator)
                ->withInput();
        }

        $customer = Customer::where('email', $credentials['email'])->first();

        if ($customer && Hash::check($credentials['password'], $customer->password)) {
            Auth::guard('customer')->login($customer);
            return redirect()->route('home')
                ->with('successMessage', 'Login berhasil');
        }

        return redirect()->back()
            ->with('errorMessage', 'Email atau password salah')
            ->withInput();
    }

    // Proses logout customer
    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();

        return redirect()->route('customer.login')
            ->with('successMessage', 'Anda telah berhasil logout');
    }
}
