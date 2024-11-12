<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Validate;
use Livewire\Form;


class LoginForm extends Form
{
    #[Validate('required|email')]
    public string $email = "";

    #[Validate('required')]
    public string $password = "";
}
