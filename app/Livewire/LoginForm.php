<?php

namespace App\Livewire;

use Livewire\Component;

class LoginForm extends Component
{
    public Forms\LoginForm $form;

    public function render()
    {
        return view('livewire.login-form');
    }
}
