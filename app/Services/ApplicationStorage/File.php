<?php

namespace App\Services\ApplicationStorage;

use Illuminate\Support\Facades\Storage;

class File implements StorageInterface
{
    public function store(array $fields): bool
    {
        if (!Storage::exists('/applications')) {
            Storage::put('/applications', json_encode([]));
        }
        $applications = json_decode(Storage::get('/applications'));
        return Storage::put('/applications', json_encode([...$applications, $fields], JSON_PRETTY_PRINT));
    }
}
