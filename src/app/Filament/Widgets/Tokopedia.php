<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Filament\Widgets\ChartWidget;

class Tokopedia extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        
        $productCounts = Product::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->get();

        $categoryCounts = Category::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->get();

        $tagCounts = Tag::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->get();

        $userCounts = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->get();

       
        $datasets = [
            [
                'label' => 'Products created',
                'data' => $productCounts->pluck('count')->toArray(),
                'backgroundColor' => '#36A2EB',
                'borderColor' => '#9BD0F5',
            ],
            [
                'label' => 'Categories created',
                'data' => $categoryCounts->pluck('count')->toArray(),
                'backgroundColor' => '#4CAF50',
                'borderColor' => '#81C784',
            ],
            [
                'label' => 'Tags created',
                'data' => $tagCounts->pluck('count')->toArray(),
                'backgroundColor' => '#FFC107',
                'borderColor' => '#FFD54F',
            ],
            [
                'label' => 'Users created',
                'data' => $userCounts->pluck('count')->toArray(),
                'backgroundColor' => '#FF5722',
                'borderColor' => '#FF8A65',
            ],
        ];

        
        $labels = [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec',
        ];

        return [
            'datasets' => $datasets,
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
