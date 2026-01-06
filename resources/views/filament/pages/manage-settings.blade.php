<x-filament-panels::page>
    <form wire:submit="save">
        {{ $this->form }}

        <div class="mt-6 flex flex-wrap items-center gap-4 justify-start">
            <x-filament::button type="submit">
                {{ __('filament-panels::resources/pages/edit-record.form.actions.save.label') }}
            </x-filament::button>
        </div>
    </form>
</x-filament-panels::page>
