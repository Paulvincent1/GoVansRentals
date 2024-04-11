<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Van;
use Illuminate\Http\Request;

class VanController extends Controller
{
    public function index()
    {
        $vans = Van::whereDoesntHave('books', function ($q) {
            $q->whereIn('status', ['accepted', 'done']);
        })->paginate(12);

        return view('rent', ['vans'  => $vans]);
    }

    public function show(Van $id)
    {

        $accepted =  Book::where('status', 'accepted')->where('van_id', $id->id)->get();


        return view('van-show', ['id' => $id, 'accepted' => $accepted]);
    }
}
