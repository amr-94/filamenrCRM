@php
    try {
        $brandName = config('app.name');
        $logo = null;
        if (\Illuminate\Support\Facades\Schema::hasTable('general_settings')) {
            $settings = \App\Models\GeneralSetting::first();
            if ($settings) {
                $brandName = $settings->dashboard_name ?: $brandName;
                $logo = $settings->getFirstMedia('dashboard_logo')?->getUrl();
            }
        }
    } catch (\Exception $e) {
        $logo = null;
        $brandName = config('app.name');
    }
@endphp

<a href="{{ filament()->getUrl() }}" class="flex items-center gap-3 px-4 py-3">
    @if ($logo)
        <img src="{{ $logo }}" alt="{{ $brandName }}" class="h-10 w-10 object-contain flex-shrink-0" />
    @endif

    <div class="flex flex-col flex-1 min-w-0">
        <span class="text-base font-bold text-gray-900 dark:text-white truncate">
            {{ $brandName }}
        </span>
    </div>
</a>

<style>
    /* إخفاء الـ brand default من Filament */
    .fi-sidebar-header .fi-logo {
        display: none !important;
    }
</style>
