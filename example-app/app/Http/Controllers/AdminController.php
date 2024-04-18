<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Record;
use App\Models\Van;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{

    public function index()
    {
        $books = Book::where('status', 'pending')->get();

        $vanCount = Van::all()->count();

        $pendingCount = Book::where('status', 'pending')->count();

        // Get the current date
        $today = Carbon::today();

        // Query the records table for profit records created today
        $profitForToday = Record::whereDate('created_at', $today)->sum('profit');

        $thirtyDaysAgo = Carbon::today()->subDays(30);
        $profitForLast30Days = Record::whereBetween('created_at', [$thirtyDaysAgo, $today])->sum('profit');

        $onGoingRequests = Book::where('status', 'accepted')->count();

        return view('admin.index', [
            'books' => $books,
            'vanCount' => $vanCount,
            'pendingCount' => $pendingCount,
            'profitForToday' => $profitForToday,
            'profitForLast30Days' => $profitForLast30Days,
            'onGoingRequests' => $onGoingRequests
        ]);
    }

    public function allVans()
    {
        $vans = Van::all();
        return view('admin.van.all-vans', ['vans' => $vans]);
    }

    public function edit(Van $id)
    {
        return view('admin.van.edit', ['van' => $id]);
    }

    public function update(Request $request, Van $id)
    {
        $data = $request->validate([
            'model' => 'required|max:50',
            'seat_capacity' => 'required|integer|min:1|max:20',
            'rate_per_day' => 'required|integer|min:1|max:20000',
            'description' => 'required|max:250',
            'img' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $filename = '';
        if ($request->has('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;

            $path = $file->storeAs('van_image', $filename, 'public');
            if (File::exists($id->img)) {
                File::delete($id->img);
            }
        }
        $data['img'] = 'storage/' . $path;

        $id->update($data);

        return redirect(route('admin.all-vans'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'model' => 'required|max:50',
            'seat_capacity' => 'required|integer|min:1|max:20',
            'rate_per_day' => 'required|integer|min:1|max:20000',
            'description' => 'required|max:250',
            'img' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $filename = '';
        if ($request->has('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;

            $path = $file->storeAs('van_image', $filename, 'public');
        }
        $data['img'] = 'storage/' . $path;
        $data['user_id'] = auth()->user()->id;

        Van::create($data);
        return response()->json('success');
    }

    public function destroy(Van $id)
    {
        $id->delete();
        return redirect()->back();
    }

    public function accept(Book $id)
    {


        $days = $id->day;
        $price = $id->van->rate_per_day;

        $total = $days * $price;
        Record::create([
            'profit' => $total
        ]);

        Book::where('van_id', $id->van->id)
        ->where('status','pending')
        ->update(['status' => 'rejected']);

        $id->update([
            'status' => 'accepted'
        ]);

        return response()->json('success');
    }

    public function reject(Book $id)
    {
        $id->update([
            'status' => 'rejected'
        ]);
        return response()->json('success');
    }

    public function onGoing()
    {
        $books = Book::where('status', 'accepted')->get();


        return view('admin.on-going', ['books' => $books]);
    }

    public function done(Book $id)
    {
        $id->update([
            'status' => 'done'
        ]);

        return redirect()->back();
    }
}
