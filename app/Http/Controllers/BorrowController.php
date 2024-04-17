<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userBook()
    {
    $borrow = Book::all();
    return view('user.book', compact('borrow'));
    }

    public function detailBook($id)
    {
    $detail = Book::find($id);
    return view('user.borrow', compact('detail'));
    }

     Public function borrowBook(Request $request){
        dd($request->all());
        //validasi apakah buku yang dipinjam tersedia
        $validate = Book::find($request->book_id);
        if($validate || $validate->available == 0){
            // Alert::error('Error', 'Book is not available');
            return redirect('/userBook');
        }

        // menambahkan datapoeminjaman buku
        Borrow::create([
            'user_id' => Auth::user()->id,
            'book_id' => $request->book_id,
            'status'=>'Borrowed',
            'borrow_date' => now()->toDateString(),
            'return_date' => null
        ]);

        // mendapatkan detail buku berdasarkan id
        $bookStatus = Book::find($request->book_id);

        // untuk mengupdate status buku
        $bookStatus->update([
            'available'=> 0
        ]);

        // Alert::success('Success', 'Book Has been borrowed');
        return redirect('/userBook');
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
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrow $borrow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borrow $borrow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrow $borrow)
    {
        //
    }
}
