<?php

namespace App\Livewire;

use App\Livewire\Forms\ForgotPasswordForm;
use Livewire\Component;

class ForgotPassword extends Component
{
    public ForgotPasswordForm $form;

    public function render()
    {
        return view('livewire.forgot-password');
    }
}
