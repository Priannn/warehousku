<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'email'=>'required',
        //     'password'=>'required'
        // ],[
        //     'email.required'=>'Email wajib diisi',
        //     'password.required'=>'Password wajib diisi',
        // ]);

        // $infoLogin = [
        //     'email'=>$request->email,
        //     'password'=>$request->password,
        // ];

        // if(Auth::attempt($infoLogin)){
        //     return redirect('/landing');
        // }else {
        //     return redirect('')->withErrors('Username dan Password yang ada masukan tidak sesuai')->withInput();
        // }
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->level == 1) {
                return redirect()->intended('/dashboard')->with('success','Kamu Berhasil Login');
            } else {
                return redirect()->intended('/landing')->with('success','Kamu Berhasil Login');
            }
        } else {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }
    
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('failed','Kamu Berhasil Logout');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
  
}
