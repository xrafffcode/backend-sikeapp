<x-app-layout title="Drug" active="drug">
    <x-alert />
    <div class="card">
        <div class="card-header">
            Data Obat
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($drug as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>
                                    <img src="{{ Storage::url($data->image) }}" alt="{{ $data->title }}" class="img-fluid"
                                        width="250">
                                </td>
                                <td>{{ $data->description }}</td>
                                <td>{{ $data->category->name }}</td>
                                <td nowrap>
                                    <a href="{{ route('drug.edit', $data->id) }}" class="btn btn-primary">Edit
                                        Data</a>
                                    <form action="{{ route('drug.destroy', $data->id) }}" method="post"
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
            <a href="{{ route('drug.create') }}" class="btn btn-primary me-1 mb-1 float-end">Tambah Data</a>
        </div>
    </div>
</x-app-layout>
