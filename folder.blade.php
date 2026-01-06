@extends('layouts.admin')

@section('title', $folderName . ' - ' . __('media.media_library'))
@section('breadcrumb', $folderName)

@section('content')
    <div class="mb-3">
        <a href="{{ route('media.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> {{ __('media.back_to_folders') }}
        </a>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">{{ __('media.media_library') }} - {{ $folderName }}</h3>
                </div>
                <div class="card-body">
                    @if ($media->count() > 0)
                        <div class="row" id="media-grid">
                            @foreach ($media as $item)
                                <div class="col-lg-2 col-md-3 col-6 mb-4 media-item" id="media-{{ $item->id }}">
                                    <div class="card h-100 shadow-sm">
                                        <div class="position-relative media-preview-container bg-light d-flex align-items-center justify-content-center overflow-hidden"
                                            style="height: 150px;">
                                            @if ($item->isImage())
                                                <img src="{{ $item->url }}" class="img-fluid"
                                                    style="object-fit: contain; width: 100%; height: 100%;"
                                                    alt="{{ $item->name }}">
                                            @else
                                                <i class="bi bi-file-earmark-text text-secondary"
                                                    style="font-size: 4rem;"></i>
                                            @endif

                                            <div class="media-overlay">
                                                <div class="btn-group">
                                                    <a href="{{ $item->url }}" target="_blank"
                                                        class="btn btn-sm btn-light" title="{{ __('media.view') }}">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-danger delete-media"
                                                        data-id="{{ $item->id }}" title="{{ __('media.delete') }}">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body p-2 text-center">
                                            <p class="text-truncate mb-1 small" title="{{ $item->name }}">
                                                {{ $item->name }}</p>
                                            <span
                                                class="badge bg-light text-dark border">{{ $item->human_readable_size }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="bi bi-images text-muted" style="font-size: 4rem;"></i>
                            <p class="mt-3 text-muted">{{ __('media.no_media') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Confirmation Modal --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('general.delete') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('media.confirm_delete') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('general.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">{{ __('general.delete') }}</button>
                </div>
            </div>
        </div>
    </div>

@section('styles')
    <style>
        .media-preview-container {
            position: relative;
        }

        .media-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.2s;
        }

        .media-preview-container:hover .media-overlay {
            opacity: 1;
        }
    </style>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            let mediaIdToDelete = null;

            $('.delete-media').on('click', function() {
                mediaIdToDelete = $(this).data('id');
                $('#deleteModal').modal('show');
            });

            $('#confirmDelete').on('click', function() {
                if (mediaIdToDelete) {
                    $.ajax({
                        url: '/admin/media/' + mediaIdToDelete,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            $('#deleteModal').modal('hide');
                            if (response.success) {
                                $('#media-' + mediaIdToDelete).fadeOut(300, function() {
                                    $(this).remove();
                                    if ($('.media-item').length === 0) {
                                        location
                                    .reload(); // Reload to show empty state if needed
                                    }
                                });
                                // Optional: Show success toast
                            } else {
                                alert(response.message);
                            }
                        },
                        error: function(xhr) {
                            $('#deleteModal').modal('hide');
                            alert('Error: ' + xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
@endsection
@endsection
