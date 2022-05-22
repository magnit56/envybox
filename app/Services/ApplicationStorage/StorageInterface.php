<?php

namespace App\Services\ApplicationStorage;

interface StorageInterface
{
    public function store(array $fields): bool;
}
