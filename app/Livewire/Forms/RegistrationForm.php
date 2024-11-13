<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class RegistrationForm extends Form
{
    #[Validate("required", message: "Please provide your name")]
    public string $name = '';
    #[Validate("required", message: "Please provide an email address")]
    #[Validate("email", message: "Please provide a valid email address")]
    public string $email = '';
    #[Validate("required", message: "Please provide a password")]
    public string $password = '';
    #[Validate("required", message: "Please confirm your password")]
    #[Validate("confirmed:password", message: "Passwords do not match.")]
    public string $password_confirmation = '';
}
