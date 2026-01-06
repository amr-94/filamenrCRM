<?php

namespace App\Filament\Pages;

use App\Models\GeneralSetting;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ColorPicker;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Pages\Page;
use Filament\Notifications\Notification;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Helpers\SEOForm;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use BackedEnum;

class ManageSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected string $view = 'filament.pages.manage-settings';

    protected static ?string $navigationLabel = 'General Settings';

    protected static ?string $title = 'General Settings';

    protected static ?string $slug = 'general-settings';

    public ?array $data = [];

    public function mount(): void
    {
        if (\Illuminate\Support\Facades\Schema::hasTable('general_settings')) {
            $settings = GeneralSetting::first();
            if (!$settings) {
                $settings = GeneralSetting::create([
                    'site_name' => 'My Site',
                    'dashboard_name' => 'Dashboard',
                ]);
            }
            $this->form->fill($settings->toArray());
        }
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Branding')
                    ->schema([
                        TextInput::make('site_name')
                            ->required(),
                        SpatieMediaLibraryFileUpload::make('site_logo')
                            ->collection('site_logo')
                            ->disk('public')
                            ->image(),
                        TextInput::make('dashboard_name')
                            ->required(),
                        SpatieMediaLibraryFileUpload::make('dashboard_logo')
                            ->collection('dashboard_logo')
                            ->disk('public')
                            ->image(),
                    ]),
                Section::make('Design')
                    ->schema([
                        ColorPicker::make('primary_color'),
                        ColorPicker::make('secondary_color'),
                    ]),
                SEOForm::make(),
            ])
            ->statePath('data')
            ->model(GeneralSetting::first() ?? GeneralSetting::class);
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();
            $settings = GeneralSetting::first();

            $settings->update($data);

            Notification::make()
                ->success()
                ->title('Settings saved successfully')
                ->send();

            $this->redirect(route('filament.admin.pages.general-settings'));
        } catch (\Exception $exception) {
            Notification::make()
                ->danger()
                ->title('Error saving settings')
                ->body($exception->getMessage())
                ->send();
        }
    }
}
