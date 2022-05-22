<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Services\ApplicationStoreServiceContract;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function store(ApplicationRequest $request, ApplicationStoreServiceContract $applicationStoreServiceContract)
    {
        return $applicationStoreServiceContract->store($request->validated(), 'db');
    }
}
