@extends('layout.app')

@section('content')
    <div class="container margin-top van-show">

        {{-- <div class="van-show"> --}}

        <div class="parent card shadow">



            <div class="child">
                <img src="{{ asset($id->img) }}" alt="" class="img-fluid img-show" style="border-radius:15px;">

            </div>




            <div class="van-info child">
                <div>

                    <h1>Model:{{ $id->model }}</h1>
                    <p>Seat Capacity: {{ $id->seat_capacity }}</p>
                    <p>Rate per day(Pesos): ₱{{ $id->rate_per_day }}</p>
                    <p>Description: {{ $id->description }}</p>
                    @if ($id->isAvailable())
                        <!-- Button trigger modal -->
                        <p class="text-center text-success mt-2" style="">This van is available</p>
                    @else
                        <p class="text-center text-danger mt-2" style="">This van is not available</p>
                    @endif

                </div>

                @if ($id->isAvailable())
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Rent this van
                    </button>
                @endif

       
            </div>

        </div>
        {{-- 
        </div> --}}

        {{-- <form action="" class="form-show child1">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" class="form-control">
            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="contact_number" class="form-control">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" class="form-control">
            <label for="note">Note:</label>
            <input type="text" id="note" class="form-control">

            <button class="btn btn-success">Rent</button>
        </form> --}}


        {{-- <h1 class="text-center mb-5">{{ $id->model }}</h1>
        <p>This car is availbale for rent</p>
        <div class="row">
            <div class="col-12 col-md-6">
                <img src="{{ asset($id->img) }}" alt="" class="text-center img-fluid shadow"
                    style=" border-radius:15px;">
            </div>
            <div class="col-12 col-md-6">
                <h2>Model: {{ $id->model }}</h2>
                <h2>Seat Capacity: {{ $id->seat_capacity }}</h2>
                <h2>Rate per day(Pesos): ₱{{ $id->rate_per_day }}</h2>
                <h2>Description: {{ $id->description }}</h2>

            </div>
        </div> --}}
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Fill up your information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="errorList"></ul>


                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" class="form-control mb-3" required>
                    <label for="contact">Contact:</label>
                    <input type="number" name="contact_number" id="contact" class="form-control mb-3">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" class="form-control mb-3" required>
                    <label for="day">Days Rent:</label>
                    <input type="number" id="day" name="day" class="form-control mb-3" required>
                    <label for="note">Note:</label>
                    <input type="text" id="note" class="form-control pb-4" required>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary submit-form"
                        data-van-id="{{ $id->id }}">Sumbit</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $(document).on('click', '.submit-form', function(e) {
                e.preventDefault();


                var id = parseInt($(this).data("van-id"), 10);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var name = $("#name").val();
                var contact = $("#contact").val();
                var address = $("#address").val();
                var day = $("#day").val();
                var note = $("#note").val();



                console.log(day)
                $.ajax({
                    type: "POST",
                    url: "/van/view/" + id,
                    data: {
                        name: name,
                        contact_number: contact,
                        address: address,
                        note: note,
                        day: day
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        location.reload();

                        // window.location.href = 'https://example.com/other-page';
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        $('#errorList').html("");
                        $('#errorList').addClass(
                            'alert alert-danger text-center');
                        $('#errorList').append('<li>' + JSON.parse(xhr.responseText)
                            .message +
                            '</li>');
                    }
                });
            });
        });
    </script>
@endsection
