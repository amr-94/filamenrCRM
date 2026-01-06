@php
    $size = number_format($media->size / 1024 / 1024, 2);
    $isImage = str_starts_with($media->mime_type, 'image/');
@endphp

<div class="space-y-4">

    {{-- Image Preview --}}
    @if ($isImage)
        <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4 text-center">
            <img src="{{ $media->getUrl() }}" alt="{{ $media->name }}" class="max-h-64 mx-auto object-contain">
        </div>
    @else
        <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-8 text-center">
            <svg class="h-16 w-16 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                </path>
            </svg>
            <p class="text-sm text-gray-500">{{ strtoupper(pathinfo($media->name, PATHINFO_EXTENSION)) }}</p>
        </div>
    @endif

    {{-- File Details --}}
    <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4 space-y-3">

        <div class="flex justify-between items-start">
            <span class="text-xs font-semibold text-gray-500 uppercase">{{ __('messages.file_name') }}</span>
            <span
                class="text-sm font-medium text-gray-900 dark:text-white text-right max-w-xs">{{ $media->name }}</span>
        </div>

        <div class="border-t border-gray-200 dark:border-gray-700 pt-3 flex justify-between items-center">
            <span class="text-xs font-semibold text-gray-500 uppercase">{{ __('messages.mime_type') }}</span>
            <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $media->mime_type }}</span>
        </div>

        <div class="border-t border-gray-200 dark:border-gray-700 pt-3 flex justify-between items-center">
            <span class="text-xs font-semibold text-gray-500 uppercase">{{ __('messages.size') }}</span>
            <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $size }} MB</span>
        </div>

        <div class="border-t border-gray-200 dark:border-gray-700 pt-3 flex justify-between items-center">
            <span class="text-xs font-semibold text-gray-500 uppercase">{{ __('messages.source') }}</span>
            <span
                class="text-sm font-medium text-gray-900 dark:text-white">{{ class_basename($media->model_type) }}</span>
        </div>

        <div class="border-t border-gray-200 dark:border-gray-700 pt-3 flex justify-between items-center">
            <span class="text-xs font-semibold text-gray-500 uppercase">{{ __('messages.upload_date') }}</span>
            <span
                class="text-sm font-medium text-gray-900 dark:text-white">{{ $media->created_at->format('d M Y - H:i') }}</span>
        </div>

    </div>

</div>
