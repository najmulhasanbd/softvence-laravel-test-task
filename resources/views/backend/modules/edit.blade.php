@extends('backend.layouts.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Edit Module</h5>
        <div class="card-body">
            <form id="moduleForm" action="{{ route('module.update', $module->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Module Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title"
                        class="form-control @error('title') is-invalid @enderror"
                        placeholder="Enter module title" value="{{ old('title', $module->title) }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="course_id" class="form-label">Select Course <span class="text-danger">*</span></label>
                    <select name="course_id" id="course_id" class="form-select @error('course_id') is-invalid @enderror">
                        <option value="" disabled>Select course</option>
                        @foreach(\App\Models\Course::all() as $course)
                            <option value="{{ $course->id }}" {{ old('course_id', $module->course_id) == $course->id ? 'selected' : '' }}>{{ $course->title }}</option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Enter module description">{{ old('description', $module->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Module</button>
                <a href="{{ route('module.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('moduleForm').addEventListener('submit', function(e) {
    let title = document.getElementById('title');
    let course = document.getElementById('course_id');

    title.classList.remove('is-invalid');
    course.classList.remove('is-invalid');
    document.querySelectorAll('.invalid-feedback.frontend').forEach(el => el.remove());

    let hasError = false;

    if(title.value.trim() === ''){
        title.classList.add('is-invalid');
        let div = document.createElement('div');
        div.className = 'invalid-feedback frontend';
        div.innerText = 'Module title is required';
        title.parentNode.appendChild(div);
        hasError = true;
    }

    if(course.value === ''){
        course.classList.add('is-invalid');
        let div = document.createElement('div');
        div.className = 'invalid-feedback frontend';
        div.innerText = 'Please select a course';
        course.parentNode.appendChild(div);
        hasError = true;
    }

    if(hasError){
        e.preventDefault();
    }
});
</script>
@endsection
