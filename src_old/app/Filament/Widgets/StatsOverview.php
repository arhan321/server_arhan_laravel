<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $reserve = Product::all()->count();
        $user = User::all()->count();
        $tagging = Tag::all()->count();
        $cat = Category::all()->count();
        return [
            Stat::make(' ', $reserve)
                ->description('Total Product')
                ->descriptionIcon('heroicon-o-building-storefront')
                ->color('success'),
            Stat::make('', $user)
                ->description('Jumlah user')
                ->descriptionIcon('heroicon-o-user-circle')
                ->color('success'),
            Stat::make('', $tagging)
                ->description('Jumlah tags')
                ->descriptionIcon('heroicon-o-tag')
                ->color('success'),
            Stat::make('', $cat)
                ->description('Jumlah Category')
                ->descriptionIcon('heroicon-o-queue-list')
                ->color('success'),
        ];
    }
}
