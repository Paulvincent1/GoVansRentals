<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{ route('admin') }}">GoVan Rentals</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <li><button class="dropdown-item">Logout</button></li>
                </form>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="{{ route('admin') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    <div class="sb-sidenav-menu-heading">Addons</div>
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Add Van
                    </a>
                    <a class="nav-link" href="{{ route('admin.all-vans')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        All vans
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                ADMIN
            </div>
        </nav>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a van</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="errorList"></ul>
                    <form action="{{ route('admin.store.van') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="model">Model:</label>
                        <input type="text" name="model" id="model" class="form-control mb-3"
                            placeholder="Ex: Toyota">
                        <label for="seat">Seat Capacity:</label>
                        <input type="number" name="seat_capacity" id="seat" class="form-control mb-3"
                            min="1" max="20" placeholder="max: 20">
                        <label for="rate">Rate per day(Pesos):</label>
                        <input type="number" name="rate_per_day" id="rate" class="form-control mb-3"
                            min="1" max="50000" placeholder="max: 50000">
                        <label for="desc">Description:</label>
                        <input type="text" name="description" id="desc" class="form-control mb-3 pb-5">
                        <label for="img">Img:</label>
                        <input type="file" name="img" id="img" class="form-control mb-3">

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" id="save">Save changes</button>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(document).on('click', '#save', function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var formdata = new FormData();
                formdata.append('model', $('#model').val());
                formdata.append('seat_capacity', $('#seat').val());
                formdata.append('rate_per_day', $('#rate').val());
                formdata.append('description', $('#desc').val());
                var img = $('#img')[0].files[0];
                formdata.append('img', img);
                $.ajax({
                    type: "POST",
                    url: "/admin/create-van",
                    data: formdata,
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        $('#exampleModal').modal('hide');
                        location.reload();
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
    <div id="layoutSidenav_content">
