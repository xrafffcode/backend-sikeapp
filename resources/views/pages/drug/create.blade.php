<x-app-layout title="Create Obat" active="drug">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create Drug</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" action="{{ route('drug.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Paracetamol.." value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file"
                                id="image" name="image" value="{{ old('image') }}">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <img src="#" class="img-fluid mt-3" id="blah" alt="image" width="100"
                                style="display: none">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" name="description"
                                class="form-control @error('description') is-invalid @enderror" id="description"
                                placeholder="Paracetamol is blala.." value="{{ old('description') }}">
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="categories_id" class="form-label">Category</label>
                            <select class="form-select @error('categories_id') is-invalid @enderror"
                                name="categories_id" id="">
                                <option value="">Chose Category</option>
                                @foreach ($drug_category as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                            @error('categories_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-1 mb-4 float-end">Submit</button>
                </form>
            </div>
        </div>
    </div>


    @push('scripts')
        <script>
            image.onchange = b => {
                blah.style.display = "block";
                let [a] = image.files;
                a && (blah.src = URL.createObjectURL(a))
            };
        </script>
    @endpush
</x-app-layout>
