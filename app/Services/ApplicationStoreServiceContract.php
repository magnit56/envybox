<?php

namespace App\Services;

interface ApplicationStoreServiceContract
{
    public function store(array $fields, string $destination): bool;
}
