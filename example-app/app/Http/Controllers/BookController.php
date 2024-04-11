<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Van;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, Van $id)
    {

        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'contact_number' => 'required',
            'note' => 'required',
            'day' => 'required',
        ]);


        $data['user_id'] = auth()->user()->id;
        $data['van_id'] = $id->id;

        Book::create($data);

        return response()->json('success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $id)
    {

        return view('my-request-edit', ['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'contact_number' => 'required',
            'note' => 'required',
            'day' => 'required',
        ]);

        $id->update($data);

        return redirect(route('my-request'));
    }

    public function destroy(Book $id)
    {



        $id->delete();

        return redirect()->back();
    }

    public function myRequest()
    {

        // $user = User::findOrFail(auth()->id());
        // $books = $user->books()->where('status', 'pending')->get();

        $books = Book::where('status', 'pending')->where('user_id', auth()->id())->get();


        return view('my-request', ['books' => $books]);
    }
    public function myRequestEdit(Book $id)
    {

        return view('my-request-edit', ['book' => $id]);
    }

    public function requestVan()
    {
        $books = Book::whereIn('status', ['accepted', 'rejected', 'done'])->where('user_id', auth()->id())->get();

        return view('request-status', ['books' => $books]);
    }
}
