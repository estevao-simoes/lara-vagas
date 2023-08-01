<?php

namespace App\Filament\Resources\Jobs;

use App\Filament\Resources\Jobs\ListingResource\Pages;
use App\Models\Jobs\Listing;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ListingResource extends Resource
{
    protected static ?string $model = Listing::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('company_logo')
                    ->circular()
                    ->extraImgAttributes(['class' => 'object-contain object-center'])
                    ->label('Empresa'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Título do cargo'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Data de criação')
                    ->date('d/m/Y'),
                Tables\Columns\TextColumn::make('posted_at')
                    ->label('Publicado')
                    ->getStateUsing(fn (Listing $record): string => $record->posted_at ? $record->posted_at->diffForHumans() : ''),
                Tables\Columns\TextColumn::make('clicks_count')
                    ->label('Cliques')
                    ->counts('clicks'),
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->enum([
                        'pending' => 'Pagamento Pendente',
                        'paid' => 'Aprovado',
                    ])
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'paid',
                    ]),
            ])
            ->filters([

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListListings::route('/'),
            'create' => Pages\CreateListing::route('/create'),
            'edit' => Pages\EditListing::route('/{record}/edit'),
        ];
    }
}
