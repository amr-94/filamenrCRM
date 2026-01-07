@php
    $size = number_format($media->size / 1024 / 1024, 2);
    $isImage = str_starts_with($media->mime_type, 'image/');
@endphp
