@extends('layout.app')
@section('content')
    <div class="container min-height">
        @if (!$vans->isEmpty())
            <h1 style="font-weight: light">Available Vans</h1>
        @endif

        <div class="row">
            @if ($vans->isEmpty())
                <div class="col-12">
                    <h1 class="no-available">No Available Van 🙁</h1>
                </div>
            @else
                @foreach ($vans as $item)
                    <div class="col-12 col-lg-3 col-md-4 g-3">
                        <a href="{{ route('van.show', ['id' => $item->id]) }}" class="anchor">
                            <div class="card shadow">
                                <img src="{{ asset($item->img) }}" alt="" class="card-img-top img-fluid"
                                    style="height: 300px; object-fit: contain;">
                                <div class="card-body">
                                    <div class="card-title text-center" style="font-weight: bold">
                                        {{ strlen($item->model) > 20 ? substr($item->model, 0, 20) . '...' : $item->model }}
                                    </div>

                                    <div class="card-title text-center">Seat Capacity:{{ $item->seat_capacity }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif

        </div>
        <div class="container">{{ $vans->links() }}</div>
    </div>
@endsection
