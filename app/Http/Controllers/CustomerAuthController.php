<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomerAuthController extends Controller
{
    // menampilkan halaman login
    public function login()
    {
        return view('web.customer.login', [
            'title' => 'Login'
        ]);
    }

    // menampilkan halaman register
    public function register()
    {
        return view('web.customer.register', [
            'title' => 'Register'
        ]);
    }

    // proses register
    public function store_register(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:customers,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);
        if ($validasi->fails()) {
            return redirect()->back()
                ->with('errorMessage', 'Validation Error, Please Check Your Input')
                ->withErrors($validasi)
                ->withInput();
        } else {
            $customer = new Customer;
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->password = Hash::make($request->password);
            $customer->save();
            //jika berhasil tersimpan, maka redirect ke halaman login
            return redirect()->route('customer.login')
                ->with('successMessage', 'Registration Successful, Please Login');
        }
    }

    // proses login
    public function store_login(Request $request)
    {
        // validasi input dengan mengambil data email dan password
        $credentials = $request->only('email', 'password');
        $validasi = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // jika validasi gagal maka redirect ke halaman login dan menampilkan pesan error
        if ($validasi->fails()) {
            return redirect()->back()
                ->with('errorMessage', 'Validasi error, silahkan cek kembali data anda')
                ->withErrors($validasi)
                ->withInput();
        }
        // jika validasi berhasil, maka lakukan login dan redirect ke halaman dashboard dengan pesan sukses
        $customer = Customer::where('email', $credentials['email'])->first();
        if ($customer && Hash::check($credentials['password'], $customer->password)) {
            // Login
            Auth::guard('customer')->login($customer);
            return redirect()->route('home')
                ->with('successMessage', 'Login berhasil');
        } else {
            return redirect()->back()
                ->with('errorMessage', 'Email atau password salah')
                ->withInput();
        }
    }
    public function logout(Request $request)
    {
        // lakukan logout
        Auth::guard('customer')->logout();
        return redirect()->route('customer.login')
            ->with('successMessage', 'Anda telah berhasil logout');
    }
}
