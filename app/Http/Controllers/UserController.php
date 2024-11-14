<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;




class UserController extends Controller
{
    public function loginView()
    {
        $loginData = User::all();
        return view('auth.login', compact('loginData'));
    }

    public function registerView()
    {
        return view('auth.register');
    }

    public function register(request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'usia' => 'required|integer',
            'alamat' => 'required|string',
            'telepon' => 'required|string',
            'password' => 'required|string|min:8|confirmed'
        ]);

        try {
            Log::info($request->all());

            if ($request->file('gambar')) {
                $path = $request->file('gambar')->store('images', 'public');
            }

            $dt = new User();
            $dt->gambar = $path;
            $dt->name = $request->name;
            $dt->email = $request->email;
            $dt->usia = $request->usia;
            $dt->alamat = $request->alamat;
            $dt->telepon = $request->telepon;
            $dt->password = Hash::make($request->input('password'));
            $dt->save();


            return redirect('login')->with('success', 'Berhasil Register');
        } catch (\Exception $e) {
            return redirect('login')->with('fail', 'Gagal Registrasi' . $e->getMessage());
        }
    }


    public function login(request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);

        $credentials = $request->only('email', 'password');

        try {
            if (Auth::attempt($credentials)) {
                return redirect()->intended('dashboard');
            } else {
                return back()->withErrors([
                    'email' => 'Email atau password yang Anda masukkan salah.',
                ])->withInput();
            }
        } catch (\Exception $e) {
            Log::error('Login error: ' . $e->getMessage());
            return back()->withErrors([
                'error' => 'Terjadi kesalahan, silakan coba lagi.',
            ])->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function profile()
    {
        $id = Auth::User()->id;
        $user = User::find($id);

        return view('profile',compact('user'));
    }

    public function update(request $request){
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpg,png,gif,jpeg|max: 4000',
            'name' => 'required|max:100',
            'usia' => 'required|integer',
            'alamat' => 'required|string',
            'telepon' => 'required|string',
            'password' => 'required|string|min:8'
        ]);

        try {
            $id = Auth::User()->id;
            $user = User::find($id);

            //jika ada gambar baru yang di upload
            if($request->file('gambar')){
                //hapus gambar lama jika ada
                if($user->gambar){
                    Storage::disk('public')->delete($user->gambar);
                }
                //simpan gambar baru
                $path = $request->file('gambar')->store('images','public');
                $user->gambar = $path;
                $user->save();
            }


            $user->name = $request->name;
            $user->usia = $request->usia;
            $user->alamat = $request->alamat;
            $user->telepon = $request->telepon;
            $user->password = Hash::make($request->input('password'));
            $user->save();

            return redirect('update')->with('success', 'Berhasil Ubah Data');
        } catch (\Exception $e) {
            return redirect('update')->with('success', $e->getMessage());
        }
    }

    // public function searchnav(){
    //     $order = OrderItem::all();
    //     return view('components.nav',compact('order'));
    // }

    // public function search(request $request){
    //     $search = $request->input('search');

    //     $posts = OrderItem::when($search,function($query,$search){
    //         return $query->where('price','like',"%{$search}");
    //     })->get();
    //     return view('search',compact('search','price'));
    // }

}
