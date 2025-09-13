@extends('backend.layouts.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-6 mb-6">
                <div class="card h-100">
                    <a href="{{route('course.index')}}" class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between mb-4">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('backend') }}/assets/img/icons/unicons/chart-success.png"
                                    alt="chart success" class="rounded" />
                            </div>
                        </div>
                        <p class="mb-1">Course</p>
                        <h4 class="card-title mb-3">{{$courses}}</h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-6 mb-6">
                <div class="card h-100">
                    <a href="{{route('module.index')}}" class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between mb-4">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('backend') }}/assets/img/icons/unicons/wallet-info.png" alt="wallet info"
                                    class="rounded" />
                            </div>
                        </div>
                        <p class="mb-1">Module</p>
                        <h4 class="card-title mb-3">{{$modules}}</h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-6 mb-6">
                <div class="card h-100">
                    <a href="{{route('content.index')}}" class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between mb-4">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('backend') }}/assets/img/icons/unicons/wallet-info.png" alt="wallet info"
                                    class="rounded" />
                            </div>
                        </div>
                        <p class="mb-1">Course Content</p>
                        <h4 class="card-title mb-3">{{$contents}}</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
