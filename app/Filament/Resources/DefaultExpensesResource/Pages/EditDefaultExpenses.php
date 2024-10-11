<?php

namespace App\Filament\Resources\DefaultExpensesResource\Pages;

use App\Filament\Resources\DefaultExpensesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDefaultExpenses extends EditRecord
{
    protected static string $resource = DefaultExpensesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
