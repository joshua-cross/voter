<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;


class LoginForm extends Form
{
    #[Validate('required', message: "Please enter your email address")]
    #[Validate('email', message: "Please enter a valid email address")]
    public string $email = "";

    #[Validate('required', message: "Please enter your password")]
    public string $password = "";
}
