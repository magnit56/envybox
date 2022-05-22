<?php

namespace App\Services\ApplicationStorage;

use App\Models\Application;

class DB implements StorageInterface
{
    public function store(array $fields): bool
    {
        $application = Application::create($fields);
        return $application->save();
    }
}
