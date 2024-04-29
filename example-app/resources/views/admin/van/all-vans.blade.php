@include('admin.shared.header')
@include('admin.shared.nav')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        All Vans
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Model</th>
                    <th>Seat Capacity</th>
                    <th>Rate per day</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($vans as $item)
                    <tr>
                        <td>{{ $item->model }}</td>
                        <td>{{ $item->seat_capacity }}</td>
                        <td>₱{{ $item->rate_per_day }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <a href="{{ route('admin.edit.van', ['id' => $item->id]) }}" class="btn btn-outline-primary"
                                style="width:100%">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.delete.van', ['id' => $item->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-outline-danger" style="width:80%" value="Delete">
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('admin.shared.footer')
