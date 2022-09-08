<x-app-layout title="Edit Hospital" active="hospitals">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Hospital</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" action="{{ route('hospital.update', $hospital->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <input type="hidden" name="id" value="{{ $hospital->id }}">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Pembaruan nama.." value="{{ $hospital->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" name="description" class="form-control" id="description"
                                placeholder="Deskripsi singkat.." value="{{ $hospital->description }}">

                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="text" name="image" class="form-control" id="image"
                                placeholder="URL Image.." value="{{ $hospital->image }}">

                        </div>
                        <div class="mb-3">
                            <label for="open_time" class="form-label">Open Time</label>
                            <input type="text" name="open_time" class="form-control" id="open_time"
                                placeholder="Waktu buka saat.." value="{{ $hospital->open_time }}">

                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" name="phone" class="form-control" id="phone"
                                placeholder="Nomor.." value="{{ $hospital->phone }}">

                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" id="address"
                                placeholder="Alamat.." value="{{ $hospital->address }}">

                        </div>
                        <div class="mb-3">
                            <label for="map_url" class="form-label">Map Url</label>
                            <input type="text" name="map_url" class="form-control" id="map_url"
                                placeholder="Map link.." value="{{ $hospital->map_url }}">

                        </div>
                        {{-- <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content" id="content" cols="30" rows="10" class="form-control" placeholder="Content.."
                                id="content">{{ $news->content }}</textarea>

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
