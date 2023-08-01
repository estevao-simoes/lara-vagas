<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?int $navigationSort = 9;

    protected static ?string $navigationIcon = 'heroicon-o-lock-closed';

    protected static ?string $navigationGroup = 'Administração';

    protected static ?string $navigationLabel = 'Usuários';

    protected static ?string $modelLabel = 'Usuário';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $pluralModelLabel = 'Usuários';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Card::make([
                TextInput::make('name')
                    ->label('Nome')
                    ->required(),
                TextInput::make('email')
                    ->label('E-mail')
                    ->email()
                    ->required(),
                Forms\Components\TextInput::make('password')
                    ->label('Senha')
                    ->password()
                    ->maxLength(255)
                    ->dehydrateStateUsing(static function ($state) use ($form) {
                        if (! empty($state)) {
                            return Hash::make($state);
                        }

                        $user = User::find($form->getColumns());

                        if ($user) {
                            return $user->password;
                        }
                    }),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            ImageColumn::make('avatar_url')
                ->label('Avatar')
                ->circular(),
            TextColumn::make('name')
                ->label('Nome')
                ->sortable()
                ->searchable(),
            TextColumn::make('email')
                ->label('E-mail')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Criado em')
                ->dateTime('M j, Y')->sortable(),
            IconColumn::make('is_admin')
                ->label('Administrador')
                ->boolean()
                ->sortable(),
        ])
            ->filters([

            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
