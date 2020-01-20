<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    //
    public function index()
    {
        $books= Book::all();

        return response()->json([ 'data' => $books ], 200);
    }

    public function show($id)
    {
        $book = Book::find($id);

        return response()->json([ 'data' => $book ], 200);
    }

    public function store(Request $request)
    {  

        /*$title = $request->$title;
        $isbn = $request->isbn;
        $year = $request->year;
        $return_date = $request->return_year;
        $borrow_date = $request->borrok_date;
        $is_available = $request->is_available;
        $created_date = $request->created_date;

        $book = Book::create(
			[
			   'title' => $title,
               'isbn' => $isbn,
               'year' => $year,
               'borrow_date' => $borrow_date,
               'is_available' => $is_available,
               'created_date' => $created_date
			]
        );*/
        
        // or shorter version
		
        $values = $request->only('title', 'isbn', 'year', 'return_date', 'borrow_date', 'is_available', 'created_date' );

        $book = Book::create($values);
        
        return response()->json(['message' => 'Book is correctly added'], 201);
    }

    public function update(Request $request, $id)
    {
        $book= Book::find($id);
        $book->save();

        return response()->json(['message' => 'The book has been updated'], 200);
    }

    public function destroy($id)
    {
        $book= Book::find($id);

        return response()->json([ 'message' => 'The book has been deleted'], 200);
    }
}
