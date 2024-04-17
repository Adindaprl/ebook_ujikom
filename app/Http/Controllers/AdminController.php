<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function userList()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function addUser()
    {
        return view('admin.formUser');
    }

    public function registerUser (Request $request){
        // dd($request->all());
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email'=> 'required',
            'name' => 'required',
            'address' => 'required',
            'role'=> 'required',
        ]);
        User::create([
            'email' => $request->email,
            'name'=> $request->name,
            'username'=> $request->username,
            'password'=> Hash::make($request->password),
            'address' => $request->address,
            'role' => 'Officer',
        ]);
        return redirect('/userList');

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editUser($id)
    {
        $users = User::where('id', $id)->first();
        return view('admin.editUser')->with('users',$users);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email'=> 'required',
            'name' => 'required',
            'address' => 'required',
            'role'=> 'required',
        ]);
        $users = User::where('id', $id)->first();

        $users->update([
            'email' => $request->email,
            'name'=> $request->name,
            'username'=> $request->username,
            'password'=> Hash::make($request->password),
            'address' => $request->address,
            'role' => $request->role,
        ]);

        return redirect(route('userList'))
        ->with('edit', 'Berhasil edit data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyUser($id)
    {
        User::where('id', $id)->delete();
        return redirect(route('userList'))->with('delete','Berhasil menghapus data');
    }
}
