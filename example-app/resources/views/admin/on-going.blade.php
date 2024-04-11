@include('admin.shared.header')
@include('admin.shared.nav')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Ongoing requests
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Model</th>
                    <th>Days rent</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Done</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($books as $item)
                    <tr>
                        <td>{{ $item->van->model }}</td>
                        <td>{{ $item->day }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->contact_number }}</td>
                        <td>
                            <form action="{{ route('admin.done', [$item->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="submit" class="btn btn-success" value="Done">
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('admin.shared.footer')
