<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class RegistrationForm extends Form
{
    #[Validate('Required')]
    public string $name;

    #[Validate('Required|Email')]
    public string $email;

    #[Validate('Required')]
    public string $password;
}
