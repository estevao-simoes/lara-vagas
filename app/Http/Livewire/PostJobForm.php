<?php

namespace App\Http\Livewire;

use App\Models\Jobs\Listing;
use Livewire\Component;
use Filament\Forms;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\ValidationException;

class PostJobForm extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $title = '';
    public $location = '';
    public $contract_type = '';
    public $url = '';
    public $company_name = '';
    public $salary = '';
    public $tags = '';
    public $company_logo = '';

    public function mount(): void
    {
        $this->form->fill([
            'title' => $this->title,
            'location' => $this->location,
            'contract_type' => $this->contract_type,
            'url' => $this->url,
            'company_name' => $this->company_name,
            'salary' => $this->salary,
            'tags' => $this->tags,
            'company_logo' => $this->company_logo,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('title')
                ->label('Título do cargo')
                ->autofocus()
                ->reactive()
                ->required(),
            Forms\Components\TextInput::make('location')
                ->reactive()
                ->label('Local')
                ->helperText('Ex.: São Paulo, SP, Remoto, Híbrido')
                ->required(),
            Forms\Components\Select::make('contract_type')
                ->reactive()
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
                ->reactive()
                ->label('Link da Vaga')
                ->activeUrl()
                ->required(),
            Forms\Components\TextInput::make('company_name')
                ->reactive()
                ->required()
                ->label('Nome da empresa'),
            Forms\Components\TextInput::make('salary')
                ->reactive()
                ->label('Faixa salarial (opcional)')
                ->helperText('Ex.: R$ 2.000,00 - R$ 3.000,00'),
            Forms\Components\Select::make('tags')
                ->reactive()
                ->label('Tags')
                ->multiple()
                ->options(Listing::getTags()->toArray())
                ->maxItems(5)
                ->required(),
            Forms\Components\FileUpload::make('company_logo')
                ->reactive()
                ->label('Logo da empresa')
                ->image()
                ->disablePreview()
                ->disk('public')
                ->required()
        ];
    }

    protected function onValidationError(ValidationException $exception): void
    {
        Notification::make()
            ->title($exception->getMessage())
            ->danger()
            ->send();
    }

    public function create()
    {
        $listing = Listing::create(array_merge($this->form->getState(), [
            'user_id' => auth()->id(),
        ]));

        if (App::environment('production')) {
            return redirect()->route('charge-checkout', $listing->id);
        }

        return redirect()->route('dashboard')->with('success', 'Anúncio criado com sucesso!');
    }

    protected function getFormModel(): string
    {
        return Listing::class;
    }

    public function render()
    {
        return view('livewire.post-job-form');
    }
}
