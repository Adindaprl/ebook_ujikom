<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//ADMIN
     public function addBook()
     {
        $category = Category::all();
         return view('admin.formBuku', compact('category'));
     }
 
     public function bookList()
     {
        $book = Book::with(['category'])->get();
        return view('admin.daftarBuku', compact('book'));
     }

    public function createBook (Request $request){
        // dd($request->all());
        $request->validate([
            'title'=> 'required',
            'image'=> 'required|image|mimes:png,jpg,jpeg,gif,svg',
        ]);
        $image = $request->file('image');
        $imgName = time() . rand() . '.' . $image->getClientOriginalExtension();

        $dPath = public_path('/assets/image/cover/');
        $image->move($dPath, $imgName);

        Book::create([
            'category_id'=> $request->category_id,
            'title'=> $request->title,
            'writer'=> $request->writer,
            'publisher'=> $request->publisher,
            'year'=> $request->year,
            'image'=> $imgName,
        ]);
        return redirect('/book');
    }


    public function bookdetail($id){
        $book = Book::find($id);
        return view('admin.detailBook', compact('book'));
    }

    

// USER


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
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
