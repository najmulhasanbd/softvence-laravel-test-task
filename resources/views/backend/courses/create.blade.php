@extends('backend.layouts.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Create New Course</h5>
        <div class="card-body">
            <form id="courseForm" action="{{ route('course.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Course Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title"
                        class="form-control @error('title') is-invalid @enderror"
                        placeholder="Enter course title" value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" id="category" class="form-select @error('category') is-invalid @enderror">
                        <option value="" selected disabled>Select category</option>
                        <option value="Frontend" {{ old('category') == 'Frontend' ? 'selected' : '' }}>Frontend</option>
                        <option value="Backend" {{ old('category') == 'Backend' ? 'selected' : '' }}>Backend</option>
                        <option value="Fullstack" {{ old('category') == 'Fullstack' ? 'selected' : '' }}>Fullstack</option>
                        <option value="DevOps" {{ old('category') == 'DevOps' ? 'selected' : '' }}>DevOps</option>
                        <option value="UI/UX" {{ old('category') == 'UI/UX' ? 'selected' : '' }}>UI/UX</option>
                        <option value="Mobile Development" {{ old('category') == 'Mobile Development' ? 'selected' : '' }}>Mobile Development</option>
                    </select>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Enter course description">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Create Course</button>
                <a href="{{ route('course.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('courseForm').addEventListener('submit', function(e) {
    let title = document.getElementById('title');
    let category = document.getElementById('category');
    
    title.classList.remove('is-invalid');
    category.classList.remove('is-invalid');
    document.querySelectorAll('.invalid-feedback.frontend').forEach(el => el.remove());

    let hasError = false;

    if (title.value.trim() === '') {
        title.classList.add('is-invalid');
        let div = document.createElement('div');
        div.className = 'invalid-feedback frontend';
        div.innerText = 'Course title is required';
        title.parentNode.appendChild(div);
        hasError = true;
    }

    if (category.value === '') {
        category.classList.add('is-invalid');
        let div = document.createElement('div');
        div.className = 'invalid-feedback frontend';
        div.innerText = 'Please select a category';
        category.parentNode.appendChild(div);
        hasError = true;
    }

    if (hasError) {
        e.preventDefault(); 
    }
});
</script>
@endsection
