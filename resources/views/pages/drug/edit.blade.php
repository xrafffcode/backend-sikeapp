<x-app-layout title="Edit Obat" active="drug">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Obat</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" action="{{ route('drug.update', $drug->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <input type="hidden" name="id" value="{{ $drug->id }}">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Category</label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Nama Dokter.." value="{{ $drug->name }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <img src="{{ Storage::url($drug->image) }}" alt="image" class="w-100">
                        <input type="file" name="image" id="image" accept="image/png, image/gif, image/jpeg"
                            class="form-control" value="{{ $gallery->image }}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="description" class="form-control" id="description"
                            placeholder="Deskripsi singkat.." value="{{ $drug->description }}">

                    </div>
                    <button type="submit" class="btn btn-primary me-1 mb-4 float-end">Submit</button>
                </form>
            </div>
        </div>
    </div>


    @push('scripts')
        <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('content');
        </script>
    @endpush
</x-app-layout>
