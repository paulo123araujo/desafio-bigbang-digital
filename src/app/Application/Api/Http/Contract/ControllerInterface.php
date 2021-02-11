<?php

namespace App\Api\Http\Contract;

interface ControllerInterface
{
    public function handle(ApiRequest $request): ApiResponse;
}
