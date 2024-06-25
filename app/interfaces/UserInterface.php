<?php

namespace App\interfaces;

interface UserInterface
{
    //

    public function create($data): mixed;
    public function readAll(): mixed;
}
