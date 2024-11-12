<?php

namespace App\Livewire;

use Livewire\Component;

class LoginForm extends Component
{
    public Forms\LoginForm $form;

    public function login()
    {
        $this->form->login();
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
