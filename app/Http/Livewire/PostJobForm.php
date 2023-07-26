<?php

namespace App\Http\Livewire;

use App\Models\Jobs\Listing;
use Livewire\Component;
use Filament\Forms;
use Filament\Notifications\Notification;
use Illuminate\Validation\ValidationException;

class PostJobForm extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $title;
    public $content;

    public function mount(): void
    {
        $this->form->fill([
            'title' => '',
            'content' => '',
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('title')
                ->label('Título do cargo')
                ->required(),
            Forms\Components\TextInput::make('locale')
                ->label('Local')
                ->helperText('Ex.: São Paulo, SP, Remoto, Híbrido')
                ->required(),
            Forms\Components\Select::make('contract_type')
                ->label('Tipo de contrato')
                ->options([
                    'FULL_TIME' => 'Tempo integral',
                    'PART_TIME' => 'Meio período',
                    'CONTRACTOR' => 'Consultor',
                    'TEMPORARY' => 'Temporário',
                    'INTERN' => 'Estagiário',
                    'VOLUNTEER' => 'Voluntário',
                    'PER_DIEM' => 'Por dia',
                    'OTHER' => 'Outro'
                ])
                ->required(),
            Forms\Components\TextInput::make('url')
                ->label('Link da Vaga')
                ->activeUrl()
                ->required(),
            Forms\Components\TextInput::make('salary')
                ->label('Faixa salarial (opcional)')
                ->helperText('Ex.: R$ 2.000,00 - R$ 3.000,00'),
            Forms\Components\Select::make('tags')
                ->label('Tags')
                ->multiple()
                ->helperText('Selecione até 4 tags')
                ->options(Listing::getTags()->toArray())
                ->optionsLimit(4)
                ->required(),
            // ...
        ];
    }

    protected function onValidationError(ValidationException $exception): void
    {
        Notification::make()
            ->title($exception->getMessage())
            ->danger()
            ->send();
    }

    public function submit(): void
    {
        // ...
    }

    public function render()
    {
        return view('livewire.post-job-form');
    }
}
