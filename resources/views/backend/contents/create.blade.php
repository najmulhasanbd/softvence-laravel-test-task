@extends('backend.layouts.master')

@section('content')
    <style>
        body {
            background-color: #f4f7fc;
            color: #333;
            font-family: 'Arial', sans-serif;
        }

        .card {
            border: none;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #fff;
            font-size: 18px;
            padding: 15px;
            border-radius: 5px;
            border-bottom: 1px solid #ddd;
        }

        .form-label {
            font-size: 14px;
            color: #555;
        }

        .form-control,
        .form-select {
            background-color: #fff;
            border: 1px solid #ccc;
            color: #333;
        }

        .form-control.is-invalid,
        .form-select.is-invalid {
            border-color: #e74c3c;
        }

        .invalid-feedback {
            font-size: 12px;
            color: #e74c3c;
        }

        .btn-primary,
        .btn-secondary {
            padding: 10px 20px;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #3498db;
            border-color: #2980b9;
        }

        .btn-secondary {
            background-color: #7f8c8d;
            border-color: #95a5a6;
        }

        .module,
        .content {
            background-color: #fff;
            border: 1px solid #ddd;
            margin: 10px 0;
            padding: 15px;
            border-radius: 5px;
        }

        .remove-btn {
            color: #e74c3c;
            cursor: pointer;
        }

        .add-btn {
            background-color: #3498db;
            color: white;
            cursor: pointer;
            margin-top: 10px;
        }
    </style>

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Create New Course Contents</h5>
            <div class="card-body">
                <form action="{{ route('content.store') }}" method="POST" id="contentForm" enctype="multipart/form-data">
                    @csrf

                    <div class="my-3">
                        <label for="course_id" class="form-label">Select Course <span class="text-danger">*</span></label>
                        <select name="course_id" id="course_id" class="form-select @error('course_id') is-invalid @enderror"
                            onchange="loadModules(this.value)">
                            <option value="" selected disabled>-- Select Course --</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                            @endforeach
                        </select>
                        @error('course_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div id="modulesContainer"></div>

                    <button type="submit" class="btn btn-primary mt-3">Save All</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        let moduleCount = 0;
        let contentCount = 0;

        let modulesData = @json($modules);

        function loadModules(courseId) {
            moduleCount = 0;
            contentCount = 0;
            document.getElementById('modulesContainer').innerHTML = '';

            addModule(courseId);
        }

        function addModule(courseId) {
            moduleCount++;

            let options = '<option value="" selected disabled>-- Select Module --</option>';
            if (modulesData[courseId]) {
                modulesData[courseId].forEach(module => {
                    options += `<option value="${module.id}">${module.title}</option>`;
                });
            }

            const moduleHTML = `
                <div class="module" id="module${moduleCount}">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6>Module ${moduleCount}</h6>
                        <span class="remove-btn" onclick="removeModule(${moduleCount})">Remove Module</span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Module Title</label>
                        <select name="modules[${moduleCount}][id]" class="form-select">
                            ${options}
                        </select>
                    </div>
                    <div id="module${moduleCount}Contents"></div>
                    <button type="button" class="btn add-btn" onclick="addContent(${moduleCount})">Add Content</button>
                </div>
            `;
            document.getElementById('modulesContainer').insertAdjacentHTML('beforeend', moduleHTML);
        }

        function addContent(moduleId) {
            contentCount++;
            const contentHTML = `
                <div class="content mb-3" id="content${contentCount}">
                    <h6>Content</h6>
                    <div class="mb-2">
                        <label class="form-label">Content Title</label>
                        <input type="text" name="modules[${moduleId}][contents][${contentCount}][title]" class="form-control" placeholder="Content title">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Video URL</label>
                        <input type="url" name="modules[${moduleId}][contents][${contentCount}][video]" class="form-control" placeholder="Video URL">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Text Content</label>
                        <textarea name="modules[${moduleId}][contents][${contentCount}][text]" class="form-control" rows="2" placeholder="Text content"></textarea>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Upload Image</label>
                        <input type="file" name="modules[${moduleId}][contents][${contentCount}][image]" class="form-control">
                    </div>
                    <span class="remove-btn" onclick="removeContent(${contentCount})">Remove Content</span>
                </div>
            `;
            document.getElementById(`module${moduleId}Contents`).insertAdjacentHTML('beforeend', contentHTML);
        }

        function removeModule(moduleId) {
            document.getElementById(`module${moduleId}`).remove();
        }

        function removeContent(contentId) {
            document.getElementById(`content${contentId}`).remove();
        }
    </script>
@endsection
