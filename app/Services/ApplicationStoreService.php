<?php

namespace App\Services;

use App\Services\ApplicationStorage\DB;
use App\Services\ApplicationStorage\File;

class ApplicationStoreService implements ApplicationStoreServiceContract
{
    public function __construct()
    {
        $this->storages = [
            'file' => File::class,
            'db' => DB::class,
        ];
    }

    public function store(array $fields, string $destination): bool
    {
        $storage = new $this->storages[$destination];
        return $storage->store($fields);
    }
}
