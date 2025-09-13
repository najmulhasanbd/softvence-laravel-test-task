@extends('backend.layouts.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Edit Course</h5>
        <div class="card-body">
            <form id="courseForm" action="{{ route('course.update', $course->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Course Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title"
                        class="form-control @error('title') is-invalid @enderror"
                        placeholder="Enter course title"
                        value="{{ old('title', $course->title) }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" id="category" class="form-select @error('category') is-invalid @enderror">
                        <option value="" disabled>Select category</option>
                        @php
                            $categories = ['Frontend', 'Backend', 'Fullstack', 'DevOps', 'UI/UX', 'Mobile Development'];
                        @endphp
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ old('category', $course->category) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Enter course description">{{ old('description', $course->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Course</button>
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
