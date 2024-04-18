@extends('layout.app')
@section('content')
    <div class="container min-height">
        <h1 class="mb-5">My requests status</h1>
        <div class="row">
            @if ($books->isEmpty())
                <div class="col-12">
                    <h1 class="no-available">You have no request status🙁</h1>
                </div>
            @else
                @foreach ($books as $book)
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="card">
               
                                <img src="{{ asset($book->van->img) }}" alt="" class="card-img-top img-fluid"
                                style="height: 250px;">
                           
                            <div class="card-body">
                                <div class="card-title text-center" style="font-weight: bold">
                                    {{ strlen($book->van->model) > 20 ? substr($book->van->model, 0, 20) . '...' : $book->van->model }}
                                </div>

                                <div style="width: 100% ;margin: 0 auto;" class="text-center">

                                    Status:@if ($book->status == 'accepted')
                                        <div class="text-success" style="display: inline-block">{{ $book->status }}</div>
                                    @elseif($book->status == 'done')
                                        <div class="text-success" style="display: inline-block">{{ $book->status }}</div>
                                    @else
                                        <div class="text-danger" style="display: inline-block">{{ $book->status }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
