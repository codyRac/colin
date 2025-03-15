<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Contact;
class ContactOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Contact', Contact::all()->count())
            ->description('Total Number')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),

        ];
    }
}
