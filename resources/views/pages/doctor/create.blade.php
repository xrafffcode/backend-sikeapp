<x-app-layout title="Create Dokter" active="doctor">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create Doctor</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" action="{{ route('doctor.store') }}" method="POST">
                    @csrf
                    <div class="form-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Dokter</label>
                            <input type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Masukan nama dokter.." value="{{ old('name') }}">
                            @error('name')
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
                            <label for="categories_id" class="form-label">Category</label>
                            <select class="form-select @error('categories_id') is-invalid @enderror" name="categories_id" id="">
                                <option value="">Pilih Category Doctor</option>
                                @foreach ($doctor_category as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                            @error('categories_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="hospitals_id" class="form-label">Workplace</label>
                            <select class="form-select @error('hospitals_id') is-invalid @enderror" name="hospitals_id" id="">
                                <option value="">Pilih Category Hospital</option>
                                @foreach ($hospital as $h)
                                    <option value="{{ $h->id }}">{{ $h->name }}</option>
                                @endforeach
                            </select>
                            @error('hospitals_id')
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
        <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('content');
        </script>
    @endpush
</x-app-layout>