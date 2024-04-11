@extends('layout.app')
@section('content')
    <div class="container min-height">
        <h1>My requests</h1>
        <div class="row">
            @if ($books->isEmpty())
                <div class="col-12">
                    <h1 class="no-available">You have no request 🙁</h1>
                </div>
            @else
                @foreach ($books as $book)
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="card">
                            <img src="{{ asset($book->van->img) }}" alt="" class="card-img-top img-fluid"
                                style="height: 300px; object-fit: contain;">
                            <div class="card-body">
                                <div class="card-title text-center" style="font-weight: bold">
                                    {{ strlen($book->van->model) > 20 ? substr($book->van->model, 0, 20) . '...' : $book->van->model }}
                                </div>

                                <div style="width: 100% ;margin: 0 auto;" class="text-center">

                                    <a href="{{ route('edit', $book->id) }}" class="btn btn-primary">Edit</a>


                                    <form action="{{ route('my-request.delete', ['id' => $book->id]) }}" method="POST"
                                        style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
