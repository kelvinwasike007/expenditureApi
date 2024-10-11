<?php

namespace App\Filament\Resources\DefaultExpensesResource\Pages;

use App\Filament\Resources\DefaultExpensesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDefaultExpenses extends ListRecords
{
    protected static string $resource = DefaultExpensesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
