@extends('layouts.admin')

@section('title', __('media.management'))
@section('breadcrumb', __('media.management'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('media.folders') }}</h3>
                </div>
                <div class="card-body">
                    @if ($folders->count() > 0)
                        <div class="row">
                            @foreach ($folders as $folder)
                                <div class="col-md-3 col-sm-6 mb-4">
                                    <a href="{{ route('media.folder', ['type' => $folder['type']]) }}"
                                        class="text-decoration-none text-dark">
                                        <div class="card h-100 shadow-sm folder-card hover-effect">
                                            <div
                                                class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                                <i class="bi {{ $folder['icon'] }} text-warning"
                                                    style="font-size: 4rem;"></i>
                                                <h5 class="mt-3 mb-1 font-weight-bold">{{ $folder['name'] }}</h5>
                                                <span class="badge bg-secondary rounded-pill">{{ $folder['count'] }}
                                                    {{ __('media.items') }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="bi bi-folder-x text-muted" style="font-size: 4rem;"></i>
                            <p class="mt-3 text-muted">{{ __('media.no_media') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <style>
        .folder-card {
            transition: transform 0.2s, box-shadow 0.2s;
            border: 1px solid #e9ecef;
            background-color: #f8f9fa;
        }

        .folder-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
            background-color: #fff;
            border-color: #ffc107;
        }

        .folder-card i {
            transition: transform 0.2s;
        }

        .folder-card:hover i {
            transform: scale(1.1);
        }
    </style>
@endsection
