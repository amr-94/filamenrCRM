@php
    $count = \App\Models\ContactMessage::where('status', 'new')->count();
@endphp

<a href="{{ \App\Filament\Resources\ContactMessages\ContactMessageResource::getUrl('index', ['tableFilters[status][value]' => 'new']) }}"
    class="relative flex items-center justify-center w-10 h-10 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors"
    title="{{ __('messages.contact') }}">
    <x-filament::icon icon="heroicon-o-chat-bubble-left-right" class="w-6 h-6 text-gray-500 dark:text-gray-400" />

    @if ($count > 0)
        <span
            class="absolute top-1 right-1 flex items-center justify-center min-w-[18px] h-[18px] px-1 text-[10px] font-bold text-white bg-danger-600 rounded-full border-2 border-white dark:border-gray-900">
            {{ $count }}
        </span>
    @endif
</a>
