@extends('backend.layouts.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="card-header">Courses List</h5>
                <a href="{{route('course.create')}}" class="btn btn-sm btn-success " style="margin-right: 20px">Add Course</a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse($courses as $key=>$course)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ ucwords($course->title) }}</td>
                                <td>{{ ucwords($course->category ?? '-') }}</td>
                                <td>{{ $course->description ?? '-' }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('course.edit', $course->id) }}">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <form action="{{ route('course.destroy', $course->id) }}" method="POST"
                                                class="d-inline delete-form ">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item btn-delete" type="submit">
                                                    <i class="bx bx-trash me-1"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No courses found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
