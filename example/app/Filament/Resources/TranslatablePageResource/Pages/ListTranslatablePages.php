<?php

namespace App\Filament\Resources\TranslatablePageResource\Pages;

use App\Filament\Resources\TranslatablePageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\ListRecords\Concerns\Translatable;

class ListTranslatablePages extends ListRecords
{
    use Translatable;

    protected static string $resource = TranslatablePageResource::class;

    protected function getActions(): array
    {
        return [
            LocaleSwitcher::make(),
            CreateAction::make(),
        ];
    }
}
