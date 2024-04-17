<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function register (Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email'=> 'required',
            'name' => 'required',
            'address' => 'required',
        ]);
        User::create([
            'email' => $request->email,
            'name'=> $request->name,
            'username'=> $request->username,
            'password'=> Hash::make($request->password),
            'address' => $request->address,
            'role' => "User"
        ]);
        return redirect('/dashboardUser');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function addUser()
    {
        return view('admin.formUser');
    }

    public function userList()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    public function login(){
        return view ('login');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required',
        ], [
            'username.exists' => 'username ini belum tersedia',
            'username.required' => 'username harus diisi',
            'password.required' => 'password harus diisi',
        ]);
       $user = $request->only('username', 'password');
        if (Auth::attempt($user)) {
            return redirect('/dashboardUser');
        // } else {
        //     return redirect('/')->with('error', 'Gagal login silahkan cek dan coba lagi');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function dashboardUser()
    {
        return view('user.dashboard');
    }

    public function error()
    {
        return view('error');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
