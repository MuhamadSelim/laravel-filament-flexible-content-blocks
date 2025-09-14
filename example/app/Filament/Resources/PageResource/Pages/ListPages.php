<?php

namespace App\Filament\Resources\FlexiblePageResource\Pages;

use Filament\Actions\CreateAction;
use App\Filament\Resources\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPages extends ListRecords
{
    protected static string $resource = PageResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
