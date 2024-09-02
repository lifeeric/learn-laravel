<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class BookController extends Controller
{
    /**
     * Display a listing of all books.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $books = Books::all();
        return response()->json($books);
    }

    /**
     * Store a newly created book in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "author" => "required|string|max:255",
            "published_date" => "required|date"
        ]);

        $book = new Books();
        $book->name = $request->name;
        $book->author = $request->author;
        $book->published_date = $request->published_date;

        // Fire the DB
        $book->save();


        return response()->json([
            'message' => 'Booked Added Successfully!'
        ], 201);
    }


    /**
     * Display the specified book by ID.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $book = Books::find($id);

        if (!empty($book)) {
            return response()->json($book);
        }

        return response()->json([
            'message' => 'Book not found.'
        ], 404);

    }


    /**
     * Update the specified book in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "author" => "required|string|max:255",
            "published_date" => "required|date"
        ]);

        if (Books::where('id', $id)->exists()) {
            $books = Books::find($id);
            $books->name = is_null($request->name) ? $books->name : $request->name;
            $books->author = is_null($request->author) ? $books->author : $request->author;
            $books->published_date = is_null($request->published_date) ? $books->published_date : $request->published_date;

            $books->save();

            return response()->json([
                "message" => "Book updateed.",
            ]);
        }

        return response()->json([
            "message" => "Book not found."
        ], 404);
    }



    /**
     * Remove the specified book from the database.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        if (Books::where('id', $id)->exists()) {
            $books = Books::find($id);
            $books->delete();

            return response()->json([
                'message' => 'Deleted book.',
            ]);
        }

        return response()->json([
            'message' => 'Book Not found.'
        ]);

    }

}
