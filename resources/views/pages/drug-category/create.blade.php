<x-app-layout title="Create Category Obat" active="drug-category">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create Obat Kategori</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" action="{{ route('drug-category.store') }}" method="POST">
                    @csrf
                    <div class="form-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Category Drug</label>
                            <input type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Category Doctor.." value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" name="description"
                                class="form-control @error('description') is-invalid @enderror" id="description"
                                placeholder="Deskripsi singkat.." value="{{ old('description') }}">
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="text" name="image"
                                class="form-control @error('image') is-invalid @enderror" id="image"
                                placeholder="URL Image.." value="{{ old('image') }}">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content" id="content" cols="30" rows="10"
                                class="form-control @error('content') is-invalid @enderror" placeholder="Content.." id="content">{{ old('content') }}</textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> --}}
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