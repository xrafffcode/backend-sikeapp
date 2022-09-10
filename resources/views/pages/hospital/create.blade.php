<x-app-layout title="Create Hospital" active="hospitals">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create Hospital</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" action="{{ route('hospital.store') }}" method="POST">
                    @csrf
                    <div class="form-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Rumah Sakit Elizabet.." value="{{ old('name') }}">
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
                            <img src="#" class="img-fluid mt-3" id="blah" alt="image" width="300"
                                style="display: none">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" cols="30" rows="10"
                                class="form-control @error('description') is-invalid @enderror" placeholder="description.." id="description">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="open_time" class="form-label">Open Time</label>
                            <input type="time" name="open_time"
                                class="form-control @error('open_time') is-invalid @enderror" id="open_time"
                                value="{{ old('open_time') }}">
                            @error('open_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone"
                                class="form-control @error('phone') is-invalid @enderror" id="phone"
                                placeholder="(0821) 2131" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address"
                                class="form-control @error('address') is-invalid @enderror" id="address"
                                placeholder="Jakarta" value="{{ old('address') }}">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="map_url" class="form-label">Map Url</label>
                            <input type="text" name="map_url"
                                class="form-control @error('map_url') is-invalid @enderror" id="map_url"
                                placeholder="https://g.page/rsuelisabethpwt?share" value="{{ old('map_url') }}">
                            @error('map_url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <label for="rating" class="form-label">Rating</label>
                        <input type="number" name="rating" class="form-control @error('rating') is-invalid @enderror"
                            id="rating" placeholder="5" value="{{ old('rating') }}">
                        @error('rating')
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
            CKEDITOR.replace('description');
        </script>
        <script>
            image.onchange = b => {
                blah.style.display = "block";
                let [a] = image.files;
                a && (blah.src = URL.createObjectURL(a))
            };
        </script>
    @endpush
</x-app-layout>
