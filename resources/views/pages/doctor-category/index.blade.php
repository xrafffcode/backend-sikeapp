<x-app-layout title="Category Dokter" active="doctor-category">
    <x-alert />
    <div class="card">
        <div class="card-header">
            Data Category Dokter
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doctor_category as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td nowrap>
                                    <a href="{{ route('doctor-category.edit', $data->id) }}" class="btn btn-primary">Edit
                                        Data</a>
                                    <form action="{{ route('doctor-category.destroy', $data->id) }}" method="post"
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
            <a href="{{ route('doctor-category.create') }}" class="btn btn-primary me-1 mb-1 float-end">Tambah Data</a>
        </div>
    </div>
</x-app-layout>
