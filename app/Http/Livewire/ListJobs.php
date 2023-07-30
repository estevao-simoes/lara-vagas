<?php

namespace App\Http\Livewire;

use Filament\Tables;
use Livewire\Component;
use App\Models\Jobs\Listing;
use Illuminate\Database\Eloquent\Builder;

class ListJobs extends Component implements Tables\Contracts\HasTable 
{
    use Tables\Concerns\InteractsWithTable; 

    public function render()
    {
        return view('livewire.list-jobs');
    }

    protected function getTableQuery(): Builder
    {
        return Listing::query()
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc');
    } 

    protected function getTableColumns(): array 
    {
        return [ 
            Tables\Columns\TextColumn::make('title')
                ->label('Título do cargo'),
            Tables\Columns\TextColumn::make('company_name')
                ->label('Nome da empresa'),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Data de criação')
                ->date('d/m/Y'),
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
        ];
    }
 
    protected function getTableActions(): array
    {
        return [ 
            Tables\Actions\Action::make('pay')
                ->label('Pagar')
                ->hidden(fn (Listing $record): bool => $record->status === 'paid')
                ->color('success')
                ->url(fn (Listing $record): string => route('charge-checkout', $record))
                ->icon('heroicon-o-credit-card')
                ->button(),
        ];
    }

    protected function getTableEmptyStateIcon(): ?string 
    {
        return 'heroicon-o-bookmark';
    }
 
    protected function getTableEmptyStateHeading(): ?string
    {
        return 'Nenhuma vaga cadastrada';
    }
 
    protected function getTableEmptyStateDescription(): ?string
    {
        return 'Cadastre uma vaga para que ela apareça aqui.';  
    }
 
    protected function getTableEmptyStateActions(): array
    {
        return [
            Tables\Actions\Action::make('create')
                ->label('Criar vaga')
                ->url(route('post-job.view'))
                ->icon('heroicon-o-plus')
                ->button(),
        ];
    } 
 
}
