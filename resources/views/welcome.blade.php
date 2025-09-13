<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Contents</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container my-5">
        <div class="d-flex align-items-center justify-content-between">
            <h1 class="mb-4 text-primary">Courses</h1>
            <div class="d-flex justify-content-end mb-3">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                @endauth
            </div>

        </div>

        <div class="accordion" id="coursesAccordion">
            @foreach ($courses as $course)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="course{{ $course->id }}Header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#course{{ $course->id }}" aria-expanded="false"
                            aria-controls="course{{ $course->id }}">
                            {{ $course->title }}
                        </button>
                    </h2>
                    <div id="course{{ $course->id }}" class="accordion-collapse collapse"
                        aria-labelledby="course{{ $course->id }}Header" data-bs-parent="#coursesAccordion">
                        <div class="accordion-body">

                            <div class="accordion" id="modulesAccordion{{ $course->id }}">
                                @foreach ($modules->where('course_id', $course->id) as $module)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="module{{ $module->id }}Header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#module{{ $module->id }}"
                                                aria-expanded="false" aria-controls="module{{ $module->id }}">
                                                {{ $module->title }}
                                            </button>
                                        </h2>
                                        <div id="module{{ $module->id }}" class="accordion-collapse collapse"
                                            aria-labelledby="module{{ $module->id }}Header"
                                            data-bs-parent="#modulesAccordion{{ $course->id }}">
                                            <div class="accordion-body">
                                                <ul>
                                                    @foreach ($contents->where('module_id', $module->id) as $content)
                                                        <li class="mb-3">
                                                            <strong>{{ $content->title }}:</strong>
                                                            {{ $content->text }}


                                                            @if ($content->video)
                                                                <div class="mt-2">
                                                                    <video width="320" height="240" controls>
                                                                        <source src="{{ $content->video }}"
                                                                            type="video/mp4">
                                                                        Your browser does not support the video tag.
                                                                    </video>
                                                                </div>
                                                            @endif

                                                            @if ($content->image)
                                                                <div class="mt-2">
                                                                    <img src="{{ asset($content->image) }}"
                                                                        alt="{{ $content->title }}"
                                                                        class="img-fluid rounded">
                                                                </div>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
