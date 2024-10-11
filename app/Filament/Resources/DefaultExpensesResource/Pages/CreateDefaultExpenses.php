<?php

namespace App\Filament\Resources\DefaultExpensesResource\Pages;

use App\Filament\Resources\DefaultExpensesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDefaultExpenses extends CreateRecord
{
    protected static string $resource = DefaultExpensesResource::class;
}
