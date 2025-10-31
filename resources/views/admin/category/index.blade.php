@extends('admin.layouts.app')

@section('content')
<div class="row">
    <!-- Category List -->
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h5>All Categories</h5>
            </div>
            <div class="card-footer">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Category Name</th>
                            <th>Category Slug</th>
                            <th class="text-center">Category Image</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories ?? [] as $key => $category)
                        <tr>
                            <td>{{ $categories->firstItem() + $key }}</td>
                            <td>{{ $category?->name }}</td>
                            <td>{{ $category?->slug }}</td>
                            <td class="text-center">
                                <img src="{{ $category?->thumbnail }}" alt="Category Image" width="60">
                            </td>
                            <td class="text-center">
                                <a href="{{ route('category.edit', $category?->id) }}" class="btn btn-danger btn-icon btn-md deleteConfirm">
                                    <i data-lucide="edit"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-danger">No Category Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-end mt-4">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Add Category -->
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h5>Add New Category</h5>
            </div>
            <div class="card-footer">
                <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label">Category Name</label>
                        <input type="text" name="name" id="categoryName" class="form-control" placeholder="Category Name">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Category Slug</label>
                        <input type="text" name="slug" id="categorySlug" class="form-control" placeholder="Category Slug">
                        @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Category Image</label><br>
                        <img src="{{ asset('default.webp') }}" width="120" class="mb-2" alt="Preview" id="categoryImagePrv">
                        <input type="file" name="image" id="categoryImage" class="form-control" onchange="validateImage(this)">
                        <span class="text-danger" id="imageError"></span>
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
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
$(function() {
    // Delete confirmation using jQuery safely
    $('.deleteConfirm').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = href;
            }
        });
    });

    // Image validation function
    function validateImage(input) {
        const file = input.files[0];
        const errorMessage = document.getElementById('imageError');
        const imagePreview = document.getElementById('categoryImagePrv');
        const submitBtn = document.getElementById('submit');

        errorMessage.textContent = '';
        submitBtn.disabled = false;

        if (file) {
            const fileSizeMB = file.size / (1024 * 1024);
            imagePreview.src = URL.createObjectURL(file);

            if (fileSizeMB > 2) {
                errorMessage.textContent = 'Image size must be less than 2MB';
                submitBtn.disabled = true;
            }
        } else {
            imagePreview.src = "{{ asset('default.webp') }}";
        }
    }

    // Expose globally for inline onchange
    window.validateImage = validateImage;
});
</script>
@endpush
