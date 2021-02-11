<?php

namespace App\Api\Factories;

use App\Api\Adapters\IlluminateRequestAdapter;
use App\Api\Http\Controllers\ArtistsByCity;
use Illuminate\Http\{Request, JsonResponse};
use Infra\Repositories\ArtistsExternalServiceRepository;
use Infra\Services\{Deezer, OpenWeather};

class ArtistsByCityFactory
{
    public function handle(Request $request): JsonResponse
    {
        $adaptedRequest = IlluminateRequestAdapter::adapt($request);
        $deezer = new Deezer();
        $openWeather = new OpenWeather();
        $repository = new ArtistsExternalServiceRepository($openWeather, $deezer);
        $controller = new ArtistsByCity($repository);
        $response = $controller->handle($adaptedRequest);
        return response()->json($response->getData(), $response->getStatusCode());
    }
}
