<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages\CreatePage;
use App\Filament\Resources\PageResource\Pages\EditPage;
use App\Filament\Resources\PageResource\Pages\ListPages;
use App\Models\Page;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\AuthorField;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\ContentBlocksField;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\Groups\HeroCallToActionSection;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\Groups\HeroImageSection;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\Groups\OverviewFields;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\Groups\PublicationSection;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\Groups\SEOFields;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\IntroField;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\SlugField;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\TitleField;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Table\Actions\PublishAction;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Table\Columns\PublishedColumn;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Table\Columns\TitleColumn;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Table\Filters\PublishedFilter;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-collection';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make()
                    ->columnSpan(2)
                    ->tabs([
                        Tab::make('General')
                            ->schema([
                                TitleField::create(true),
                                SlugField::create(),
                                PublicationSection::create(),
                                AuthorField::create(),
                                HeroImageSection::create(),
                                HeroCallToActionSection::create(),
                                IntroField::create(),
                            ]),
                        Tab::make('Content')
                            ->schema([
                                ContentBlocksField::create(),
                            ]),
                        Tab::make('Overview')
                            ->schema([
                                OverviewFields::create(),
                            ]),
                        Tab::make('SEO')
                            ->schema([
                                SEOFields::create(),
                            ]),
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TitleColumn::create(),
                PublishedColumn::create(),
            ])
            ->filters([
                PublishedFilter::create(),
            ])
            ->recordActions([
                EditAction::make(),
                PublishAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPages::route('/'),
            'create' => CreatePage::route('/create'),
            'edit' => EditPage::route('/{record}/edit'),
        ];
    }
}
