<x-app-layout title="Edit Doctor" active="doctor">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Dokter</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" action="{{ route('doctor.update', $doctor->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <input type="hidden" name="id" value="{{ $doctor->id }}">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Category</label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Nama Dokter.." value="{{ $doctor->name }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="text" name="image" class="form-control" id="image"
                            placeholder="URL Image.." value="{{ $doctor->image }}">

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
