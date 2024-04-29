<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Van;
use Illuminate\Http\Request;

class VanController extends Controller
{
    public function index()
    {
        $vans = Van::whereDoesntHave('books', function ($q) {
            $q->where('status','accepted');
        })->get();
        return response()->json($vans);
    }
    public function show(Van $id){
        return response()->json($id);
    }
}
