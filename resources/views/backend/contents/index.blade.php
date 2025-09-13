@extends('backend.layouts.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="card-header">Content List</h5>
                <a href="{{ route('content.create') }}" class="btn btn-sm btn-success" style="margin-right: 20px">Add
                    Content</a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Photo</th>
                            <th>Title</th>
                            <th>Course</th>
                            <th>Module</th>
                            <th>Video URL</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse($contents as $content)
                            <tr>
                                <td>{{ $content->id }}</td>
                                <td>
                                    @if ($content->image)
                                        <img src="{{ asset($content->image) }}" alt="Content Image" width="100">
                                    @else
                                        <span>No Image</span>
                                    @endif
                                </td>
                                <td>{{ ucwords($content->title) }}</td>
                                <td>{{ $content->course->title ?? '-' }}</td>
                                <td>{{ $content->module->title ?? '-' }}</td>
                                <td>{{ $content->video ?? '-' }}</td>
                                <td>{{ $content->text ?? '-' }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('content.edit', $content->id) }}">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <a class="dropdown-item" href="{{ route('content.show', $content->id) }}">
                                                <i class="bx bx-eye-alt me-1"></i> show
                                            </a>
                                            <form action="{{ route('content.destroy', $content->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item btn-delete" type="submit"
                                                 >
                                                    <i class="bx bx-trash me-1"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No contents found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
