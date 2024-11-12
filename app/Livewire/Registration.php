<?php

namespace App\Livewire;

use App\Livewire\Forms\RegistrationForm;
use Livewire\Component;

class Registration extends Component
{
    public RegistrationForm $form;

    public function render()
    {
        return view('livewire.registration');
    }
}
