<a href="{{ route('filament.admin.pages.dashboard') }}" class="flex items-center gap-2 px-4 py-3 filament-sidebar-header">
    @if ($logo)
        <img src="{{ $logo }}" alt="{{ $name }}" class="h-8 w-auto object-contain shrink-0" />
    @endif

    @if ($name)
        <span class="text-base font-semibold whitespace-nowrap" style="color: {{ $color ?? '#000' }}">
            {{ $name }}
        </span>
    @endif
</a>
