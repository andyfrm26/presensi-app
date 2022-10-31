<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $mahasiswa = DB::table('users')->where('role', 'student')->get();
        $i = 0;
        return view('admin.mahasiswa.index', [
            'title' => 'Mahasiswa',
            'user' => Auth::user(),
            'mahasiswa' => $mahasiswa,
            'i' => $i,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.mahasiswa.create', [
            'title' => 'Tambah Mahasiswa',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|min:6|same:confirmPassword',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect('/dashboard/mahasiswa/')->with('success', 'Berhasil menambahkan mahasiswa!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        return view('admin.mahasiswa.edit', [
            'title' => 'Edit Mahasiswa',
            'user' => User::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users,email,'.$id,
            'password' => 'required|min:6|same:confirmPassword',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::find($id)->update($validated);

        return redirect('/dashboard/mahasiswa/')->with('success', 'Berhasil mengedit mahasiswa!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        User::find($id)->delete();
        return redirect('/dashboard/mahasiswa/')->with('success', 'Berhasil menghapus mahasiswa!');
    }

    public function checkLogin(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if(Auth::user()->role=='admin'){
                return redirect()->intended('dashboard');
            }
            return redirect()->intended('home');
        }

        return back()->with('error', 'Login gagal!');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
