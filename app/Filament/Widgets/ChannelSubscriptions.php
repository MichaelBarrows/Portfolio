<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Broadcast;

class ChannelSubscriptions extends BaseWidget
{
    protected function getStats(): array
    {
        $users = Broadcast::getPusher()->getChannelInfo(
            channel: 'settings',
            params: ['info' => 'subscription_count'],
        )?->subscription_count ?? 0;

        return [
            Stat::make('Current Channel Subscribers', $users),
        ];
    }
}
