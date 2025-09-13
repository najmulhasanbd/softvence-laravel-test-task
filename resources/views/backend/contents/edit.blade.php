@extends('backend.layouts.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card shadow-sm">
        <h5 class="card-header bg-primary text-white">Edit Content</h5>
        <div class="card-body">
            <form action="{{ route('content.update', $content->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Select Course -->
                <div class="mb-3">
                    <label for="course_id" class="form-label">Select Course <span class="text-danger">*</span></label>
                    <select name="course_id" id="course_id"
                        class="form-select @error('course_id') is-invalid @enderror">
                        <option value="" disabled>-- Select Course --</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" {{ $course->id == $content->course_id ? 'selected' : '' }}>
                                {{ $course->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Select Module -->
                <div class="mb-3">
                    <label for="module_id" class="form-label">Select Module <span class="text-danger">*</span></label>
                    <select name="module_id" id="module_id"
                        class="form-select @error('module_id') is-invalid @enderror">
                        <option value="" disabled>-- Select Module --</option>
                        @foreach ($modules as $module)
                            <option value="{{ $module->id }}" {{ $module->id == $content->module_id ? 'selected' : '' }}>
                                {{ $module->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('module_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label">Content Title</label>
                    <input type="text" name="title" id="title" class="form-control"
                        value="{{ old('title', $content->title) }}">
                </div>

                <!-- Video -->
                <div class="mb-3">
                    <label for="video" class="form-label">Video URL</label>
                    <input type="url" name="video" id="video" class="form-control"
                        value="{{ old('video', $content->video) }}">
                </div>

                <!-- Text -->
                <div class="mb-3">
                    <label for="text" class="form-label">Text Content</label>
                    <textarea name="text" id="text" class="form-control" rows="4">{{ old('text', $content->text) }}</textarea>
                </div>

                <!-- Image -->
                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @if ($content->image)
                        <img src="{{ asset($content->image) }}" alt="Current Image" class="mt-2" width="150">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update Content</button>
            </form>
        </div>
    </div>
</div>
@endsection
