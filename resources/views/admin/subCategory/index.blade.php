@extends('admin.layouts.app')

@section('content')
<div class="row">
    <!-- Sub Categories List -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>All Sub Categories</h5>
            </div>
            <div class="card-footer">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Category Name</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($subCategories ?? [] as $key => $subCategory)
                            <tr>
                                <td>{{ $subCategories->firstItem() + $key }}</td>
                                <td>{{ $subCategory->category?->name ?? 'N/A' }}</td>
                                <td>{{ $subCategory->name }}</td>
                                <td>{{ $subCategory->slug }}</td>
                                <td class="text-center">
                                    <img src="{{ $subCategory->thumbnail }}" alt="{{ $subCategory->name }}" width="60">
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('subCategory.edit', $subCategory->id) }}" class="btn btn-danger btn-icon btn-md">
                                        <i data-lucide="edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-danger">No Sub Categories Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-end mt-4">
                    {{ $subCategories->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Add Sub Category Form -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>Add New Sub-Category</h5>
            </div>
            <div class="card-footer">
                <form action="{{ route('subCategory.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Sub-Category Name" value="{{ old('name') }}">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="Sub-Category Slug" value="{{ old('slug') }}">
                        @error('slug') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Category</label>
                        <select name="category" class="form-control form-select">
                            <option value="">Select Category</option>
                            @foreach ($categories ?? [] as $category)
                                <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Thumbnail</label><br>
                        <img src="{{ asset('default.webp') }}" width="120" class="mb-2" id="subCategoryImagePrv" alt="Preview">
                        <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(this)">
                        <span class="text-danger" id="imageError"></span>
                        @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
function previewImage(input) {
    const file = input.files[0];
    const errorMessage = document.getElementById('imageError');
    const preview = document.getElementById('subCategoryImagePrv');
    const submitBtn = document.getElementById('submit');

    errorMessage.textContent = '';
    submitBtn.disabled = false;

    if (file) {
        const sizeMB = file.size / (1024*1024);
        preview.src = URL.createObjectURL(file);

        if (sizeMB > 2) {
            errorMessage.textContent = 'Image size must be less than 2MB';
            submitBtn.disabled = true;
        }
    } else {
        preview.src = "{{ asset('default.webp') }}";
    }
}
</script>
@endpush
