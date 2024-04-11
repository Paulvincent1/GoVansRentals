@include('admin.shared.header')
@include('admin.shared.nav')

<div class="container center-div">

    <div class="row">


        <div class="section1 col-12 col-md-6">

            <form action="{{ route('admin.update.van', ['id' => $van->id]) }}" method="POST" enctype="multipart/form-data"
                class="form-card">
                @csrf
                @method('PUT')
                <h1 class="text-center" style="font-family: cursive">Edit van</h1>
                <label for="model">Van model:</label>
                <input type="text" class="form-control" name="model" id="model" value="{{ $van->model }}"
                    required>
                @error('model')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <label for="seat">Seat Capacity:</label>
                <input type="text" class="form-control" name="seat_capacity" id="seat"
                    value="{{ $van->seat_capacity }}" required>
                @error('seat_capacity')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <label for="rate">Rate Per Day(Pesos):</label>
                <input type="number" class="form-control" min="1" name="rate_per_day" id="rate"
                    value="{{ $van->rate_per_day }}" required>
                @error('rate_per_day')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <label for="img">Van Img:</label>
                <input type="file" class="form-control" name="img" id="img" required>
                @error('img')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <label for="desc">Description:</label>
                <input type="text" class="form-control pb-5" name="description" id="desc"
                    value="{{ $van->description }}" required>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="submit" class="btn btn-success mt-3 form-control">
            </form>
        </div>
        <div class="col-12 col-md-6">
            <img src="{{ asset($van->img) }}" alt="" class="img-fluid"
                style="width: 500px; height:500px; border-radius:15px; box-shadow:10px 10px 10px gray;">
        </div>

    </div>
</div>


@include('admin.shared.footer')
