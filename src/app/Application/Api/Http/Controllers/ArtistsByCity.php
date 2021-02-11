<?php

namespace App\Api\Http\Controllers;

use App\Api\Http\Contract\{
    ApiRequest,
    ApiResponse,
    ControllerInterface
};
use Infra\Repositories\ArtistsExternalServiceRepository;

class ArtistsByCity implements ControllerInterface
{
    private ArtistsExternalServiceRepository $repository;

    public function __construct(ArtistsExternalServiceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(ApiRequest $request): ApiResponse
    {

        $city = $this->getCityFromUrl($request->getPath());
        $temperature = $this->repository->getTemperatureByCity($city);
        $artists = $this->repository->getArtists($temperature);

        return new ApiResponse(200, $artists->toArray());
    }

    private function getCityFromUrl(string $path): string
    {
        $urlExploded = explode("/", $path);
        return $urlExploded[count($urlExploded) - 2];
    }
}
