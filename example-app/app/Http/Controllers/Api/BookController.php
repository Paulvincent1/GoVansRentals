<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Van;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function store(Request $request, Van $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'contact_number' => 'required',
            'note' => 'required',
            'day' => 'required'
        ]);

        $data['user_id'] = auth()->user()->id;
        $data['van_id'] = $id->id;
        Book::create($data);

        return response()->json('sucess');
    }
    public function myRequest()
    {
        $bookings = Book::where('user_id', auth()->user()->id)->where('status', 'pending')->get();

        return response()->json($bookings);
    }
    public function edit(Book $id)
    {

        return response()->json($id);
    }

    public function update(Request $request, Book $id)
    {

        $data = $request->validate([
            'name' => 'required|min:4',
            'address' => 'required',
            'contact_number' => 'required',
            'note' => 'required',
            'day' => 'required'
        ]);

        $id->update($data);

        return response()->json('success');
    }

    public function destroy(Book $id)
    {
        $id->delete();
        return response()->json('success delete');
    }

    public function requestVan()
    {
        $books = Book::whereIn('status', ['accepted', 'rejected', 'done'])->where('user_id', auth()->id())->get();

        return response()->json($books);
    }
}
