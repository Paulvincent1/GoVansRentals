@include('admin.shared.header')
@include('admin.shared.nav')

<div class="container center-div">

    <div class="row">


        <div class="section1 col-12 col-md-6">

            <form action="" method="POST" enctype="multipart/form-data" class="form-card">
                @csrf
                <h1 class="text-center" style="font-family: cursive">Edit van</h1>
                <label for="">Van model:</label>
                <input type="text" class="form-control">
                <label for="">Seat Capacity:</label>
                <input type="text" class="form-control">
                <label for="">Location:</label>
                <input type="text" class="form-control">
                <label for="">Rate Per Day(Pesos):</label>
                <input type="number" class="form-control" min="1">
                <label for="">Van Img:</label>
                <input type="file" class="form-control">
                <label for="">Description:</label>
                <input type="text" class="form-control">
                <input type="submit" class="btn btn-success mt-3 form-control">
            </form>
        </div>
        <div class="col-12 col-md-6">
            <img src="{{ asset('assets/van2.avif') }}" alt="" class="img-fluid"
                style="width: 500px; height:500px; border-radius:15px; box-shadow:10px 10px 10px gray;">
        </div>

    </div>
</div>


@include('admin.shared.footer')
