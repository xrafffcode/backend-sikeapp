<x-app-layout title="Edit Category Obat" active="drug">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Obat Kategori</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" action="{{ route('drug-category.update', $drug_category->id) }}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <input type="hidden" name="id" value="{{ $drug_category->id }}">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Category</label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Nama obat.." value="{{ $drug_category->name }}">
                        </div>
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
