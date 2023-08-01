<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubscriberResource\Pages;
use App\Models\Subscriber;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class SubscriberResource extends Resource
{
    protected static ?string $model = Subscriber::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                Forms\Components\TextInput::make('email')
                    ->label('E-mail')
                    ->email()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('email')
                    ->label('E-mail'),
            ])
            ->filters([

            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->modalWidth('lg'),
            ])
            ->bulkActions([

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
            'index' => Pages\ListSubscribers::route('/'),
        ];
    }

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
