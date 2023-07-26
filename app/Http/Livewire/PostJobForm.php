<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Filament\Forms;

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
            Forms\Components\TextInput::make('title')->required(),
            Forms\Components\MarkdownEditor::make('content'),
            // ...
        ];
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
