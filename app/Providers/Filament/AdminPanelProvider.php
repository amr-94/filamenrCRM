<?php

namespace App\Providers\Filament;

use App\Models\GeneralSetting;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use TomatoPHP\FilamentCms\FilamentCmsPlugin;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\Facades\Schema;
use Illuminate\Contracts\View\View;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        $primaryColor = Color::Amber;
        $brandName = 'Filament CRM';
        $brandLogo = null;

        if (Schema::hasTable('general_settings')) {
            try {
                $settings = GeneralSetting::first();
                if ($settings) {
                    $brandName = $settings->dashboard_name ?: $brandName;

                    // Try to get logo more reliably
                    $logoMedia = $settings->getFirstMedia('dashboard_logo');

                    if ($logoMedia) {
                        $brandLogo = $logoMedia->getUrl();
                    }

                    if ($settings->primary_color && str_contains($settings->primary_color, '#')) {
                        $primaryColor = $settings->primary_color;
                    } elseif ($settings->primary_color) {
                        $primaryColor = $settings->primary_color;
                    }
                }
            } catch (\Exception $e) {
            }
        }

        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName($brandName)
            ->brandLogo($brandLogo)
            ->brandLogoHeight('2.5rem')
            ->colors([
                'primary' => $primaryColor,
            ])
            ->plugin(
                FilamentCmsPlugin::make()
                    ->usePost(false)
                    ->useCategory(false)
            )
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                \App\Http\Middleware\SetLocaleMiddleware::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->renderHook(
                'panels::sidebar.header',
                fn(): View => view('filament.components.dashboard-logo', ['logo' => $brandLogo, 'name' => $brandName]),
            )
            ->renderHook(
                'panels::user-menu.before',
                fn(): View => view('filament.components.language-switcher'),
            );
    }
}