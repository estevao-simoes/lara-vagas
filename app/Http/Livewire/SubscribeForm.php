<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subscriber;
use Filament\Notifications\Notification;
use Illuminate\Validation\ValidationException;

class SubscribeForm extends Component
{

    public string $email;

    protected $rules = [
        'email' => 'required|email|unique:subscribers,email',
    ];

    public function subscribe()
    {
        $this->validate(
            ['email' => 'required|email|unique:subscribers,email'],
            [
                'email.required' => 'O :attribute precisa ser preenchido.',
                'email.email' => 'O :attribute precisa ter um formato válido.',
                'email.unique' => 'O :attribute já consta na nossa base.',
            ],
            ['email' => 'E-mail']
        );

        Subscriber::create([
            'email' => $this->email,
        ]);

        $this->email = '';

        Notification::make()
            ->title('Inscrito com sucesso!')
            ->success()
            ->send();
    }

    protected function onValidationError(ValidationException $exception): void
    {
        Notification::make()
            ->title($exception->getMessage())
            ->danger()
            ->send();
    }

    public function render()
    {
        return view('livewire.subscribe-form');
    }
}
