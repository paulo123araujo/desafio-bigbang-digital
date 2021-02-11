<?php

namespace App\Api\Adapters;

use App\Api\Http\Contract\ApiRequest;
use Illuminate\Http\Request;

class IlluminateRequestAdapter
{
    public static function adapt(Request $request): ApiRequest
    {
        $path = $request->fullUrl();
        $query = $request->query();
        $body = $request->all();
        return new ApiRequest($path, $query, $body);
    }
}
