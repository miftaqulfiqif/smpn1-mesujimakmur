<?php

namespace App\Providers;

use App\Models\Pendaftar;
use App\Models\PeriodeDaftar;
use App\Observers\PendaftarObserver;
use App\Observers\PeriodeObserver;
use Filament\Actions\CreateAction;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Filament\Resources\Pages\CreateRecord::disableCreateAnother();
        CreateAction::configureUsing(fn(CreateAction $action) => $action->createAnother(false));
        PeriodeDaftar::observe(PeriodeObserver::class);
    }
}
