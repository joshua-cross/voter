<?php

use function Pest\Laravel\get;

it('gives back successful response for home', function () {
   // Act & Assert
   get(route('home'))
       ->assertOk();
});
