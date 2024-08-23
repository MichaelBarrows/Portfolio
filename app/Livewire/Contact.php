<?php

namespace App\Livewire;

use App\Actions\Contact\CreateContactAction;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Livewire\Component;

class Contact extends Component implements HasForms
{
    use InteractsWithForms;

    public array $data = [
        'name' => null,
        'email' => null,
        'phone' => null,
        'message' => null,
    ];

    public bool $disabled = false;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Grid::make(['default' => 1])
                        ->schema([
                            ViewField::make('name')
                                ->view('components.forms.text-input')
                                ->label('Name')
                                ->required(),

                            ViewField::make('email')
                                ->view('components.forms.email-input')
                                ->required(),

                            ViewField::make('phone')
                                ->view('components.forms.text-input')
                                ->required()
                                ->rules(['min:11']),
                        ]),

                        ViewField::make('message')
                            ->view('components.forms.textarea')
                            ->required()
                            ->rules(['min:10']),
                    ])->from('md'),
            ])
            ->statePath('data');
    }

    public function save(CreateContactAction $createContactAction)
    {
        $data = $this->validate()['data'];

        $createContactAction->execute($data);

        Notification::make()
            ->title('Success')
            ->body('The contact form has been submitted successfully')
            ->success()
            ->send();

        $this->disabled = true;
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
