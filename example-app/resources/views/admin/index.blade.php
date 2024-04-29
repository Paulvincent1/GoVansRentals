@include('admin.shared.header')
@include('admin.shared.nav')


<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card text-white mb-4" style="background-color: #70d6ff;">
                    <div class="card-body">
                        <h5 class="card-title mb-0">All Vans</h5>
                        <div class="card-body d-2" style="font-size: 2rem;">{{ $vanCount }} <a
                                href="{{ route('admin.all-vans') }}"><i class="fas fa-angle-right"></i></a></div>
                    </div>

                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card text-white mb-4" style="background-color: #89fc00;">
                    <div class="card-body">
                        <h5 class="card-title mb-0">Profit Today</h5>
                        <div class="card-body d-2" style="font-size: 2rem;">₱{{ $profitForToday }}</div>
                    </div>

                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card text-white mb-4" style="background-color: #f4e409;">
                    <div class="card-body">
                        <h5 class="card-title mb-0">Profit for the last 30 days</h5>
                        <div class="card-body d-2" style="font-size: 2rem;">₱{{ $profitForLast30Days }}</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card text-white mb-4" style="background-color: #80ed99;">
                    <div class="card-body">
                        <h5 class="card-title mb-0">Ongoing Requests</h5>
                        <div class="card-body d-2" style="font-size: 2rem;">{{ $onGoingRequests }} <a
                                href="{{ route('admin.on-going') }}"><i class="fas fa-angle-right"></i></a></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Requests
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Note</th>
                            <th>Days Rent</th>
                            <th>Status</th>
                            <th>Reject</th>
                            <th>Accept</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($books as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->contact_number }}</td>
                                <td>{{ $item->note }}</td>
                                <td>{{ $item->day }}</td>
                                <td>
                                    <div class="status text-center">{{ $item->status }}</div>
                                </td>
                                <td>
                                    <button class="btn btn-outline-danger form-control btn-reject"
                                        data-van-id="{{ $item->id }}">Reject</button>
                                </td>
                                <td><button class="btn btn-outline-success form-control btn-accept"
                                        data-van-id="{{ $item->id }}">Accept</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function() {
        $(document).on('click', '.btn-accept', function(e) {
            e.preventDefault();


            var id = $(this).data('van-id');
            console.log(id);

            var confirmation = confirm("Do you want to accept the request?");
            if (confirmation) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "PUT",
                    url: "/admin/accept/" + id,
                    success: function(response) {
                        console.log(response);
                        location.reload();
                    }
                });
            }

        });


        $(document).on('click', '.btn-reject', function(e) {
            e.preventDefault();


            var id = $(this).data('van-id');
            console.log(id);

            var confirmation = confirm("Are you sure you want to reject the request?")
            if (confirmation) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: "/admin/reject/" + id,
                    success: function(response) {
                        console.log(response);
                        location.reload();
                    }
                });
            }

        });
    });
</script>
@include('admin.shared.footer')
