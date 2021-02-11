<?php

namespace App\Api\Http\Controllers;

use App\Api\Http\Contract\{
    ApiRequest,
    ApiResponse,
    ControllerInterface
};
use Infra\Repositories\ArtistsExternalServiceRepository;

class ArtistsByLatitudeLongitude implements ControllerInterface
{
    private ArtistsExternalServiceRepository $repository;

    public function handle(ApiRequest $request): ApiResponse
    {
        $latitude = $request->query["latitude"];
        $longitude = $request->query["longitude"];
        $temperature = $this->repository->getTemperatureByLatitudeLongitude($latitude, $longitude);
        $artists = $this->repository->getArtists($temperature);

        return new ApiResponse(200, $artists->toArray());
    }
}
