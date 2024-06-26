@extends('layout.app')
@section('content')
    <div class="container min-height">
        <div class="row align-items-center g-3">
            <div class="col-12 col-md-6">
                <h1 class="text-center">Edit Request</h1>
                <form action="{{ route('update', ['id' => $id->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="name">Name:</label>
                    <input type="text" id="name" class="form-control mb-3" name="name" value="{{ $id->name }}">
                    @error('name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <label for="address">Address:</label>
                    <input type="text" id="address" class="form-control mb-3" name="address"
                        value="{{ $id->address }}">
                        @error('address')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    <label for="contact_number">Contact Number:</label>
                    <input type="text" id="contact_number" class="form-control mb-3" name="contact_number"
                        value="{{ $id->contact_number }}">
                        @error('contact_number')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    <label for="day">Day:</label>
                    <input type="number" id="day" class="form-control mb-3" name="day"
                        value="{{ $id->day }}" min="1" max="20">
                        @error('day')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    <label for="note">Note:</label>
                    <textarea type="text" id="note" class="form-control pb-4 mb-3" name="note"
                       >{{ $id->note }}</textarea>
                       @error('note')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    <input type="submit" class="btn btn-outline-primary" style="width:100% ">
                </form>
            </div>
            <div class="col-12 col-md-6">

                <div style="width: 100%; display:flex; flex-direction:column; justify-content:center; align-items:center">

                    <img src="{{ asset($id->van->img) }}" alt=""class="img-fluid"
                        style="width: 500px; height:500px; border-radius:15px; box-shadow:10px 10px 10px gray;">
                    <h3 class="text-center mt-3" style="font-weight: bold">{{ $id->van->model }}</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
