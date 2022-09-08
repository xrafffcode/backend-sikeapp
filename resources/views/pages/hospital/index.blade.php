<x-app-layout title="Hospital" active="hospitals">
    <x-alert />
    <div class="card">
        <div class="card-header">
            Data Hospital
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Open Time</th>
                            <th>Phone</th>
                            <th>ddress</th>
                            <th>Map Link</th>
                            <th>Rating</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hospitals as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->description }}</td>
                                <td>
                                    <img src="{{ $data->image }}" alt="{{ $data->name }}" class="img-fluid"
                                        width="250">
                                </td>
                                <td>{{ $data->open_time }}</td>
                                <td>{{ $data->address }}</td>
                                <td>{{ $data->map_url }}</td>
                                <td>{{ $data->rating }}</td>
                                {{-- <td>{!! Str::limit(strip_tags($data->open_time), 40) !!}</td>
                                <td>{!! Str::limit(strip_tags($data->phone), 40) !!}</td> --}}
                                <td nowrap>
                                    <a href="{{ route('hospital.edit', $data->id) }}" class="btn btn-primary">Edit
                                        Data</a>
                                    <form action="{{ route('hospital.destroy', $data->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('yakin ingin menghapus data?');">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a href="{{ route('hospital.create') }}" class="btn btn-primary me-1 mb-1 float-end">Tambah Data</a>
        </div>
    </div>
</x-app-layout>
