<div class="flex items-center gap-x-2 px-2">
    @foreach (\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        @if ($localeCode !== App::getLocale())
            <a href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($localeCode, url('/admin')) }}"
                class="flex items-center justify-center w-8 h-8 text-[10px] font-bold uppercase rounded-full bg-gray-100 text-gray-700 hover:bg-primary-600 hover:text-white transition-all duration-200 shadow-sm border border-gray-200"
                title="{{ $properties['native'] }}">
                {{ $localeCode }}
            </a>
        @endif
    @endforeach
</div>
