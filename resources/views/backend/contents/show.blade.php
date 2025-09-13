@extends('backend.layouts.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card shadow-sm">
            <h5 class="card-header bg-primary text-white">Content Details</h5>
            <div class="card-body">
                <h4 class="mb-3">{{ ucwords($content->title) }}</h4>

                <div class="mb-3">
                    <strong>Course:</strong> {{ ucwords($content->course->title ?? 'No course available') }}
                </div>

                <div class="mb-3">
                    <strong>Module:</strong> {{ $content->module->title ?? 'No module available' }}
                </div>

                <div class="mb-3">
                    <strong>Video URL:</strong>
                    <a href="{{ $content->video }}" target="_blank" class="text-decoration-none">
                        {{ $content->video ?? 'No video available' }}
                    </a>
                </div>

                <div class="mb-3">
                    <strong>Description:</strong>
                    <p>{{ $content->text ?? 'No description available' }}</p>
                </div>

                @if ($content->image)
                    <div class="mb-3">
                        <strong>Image:</strong>
                        @if ($content->image)
                            <img src="{{ asset($content->image) }}" alt="Current Image" class="mt-2" width="150">
                        @endif
                    </div>
                @endif

                <div class="mb-3">
                    <a href="{{ route('content.edit', $content->id) }}" class="btn btn-warning">Edit Content</a>
                    <a href="{{ route('content.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
@endsection
