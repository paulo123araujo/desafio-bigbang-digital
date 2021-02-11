<?php

namespace Infra\Repositories;

use Domain\Entities\Artists;
use Domain\UseCases\ArtistsByTemperature;
use Infra\Services\{Deezer, OpenWeather};

class ArtistsExternalServiceRepository implements ArtistsByTemperature
{
    private OpenWeather $openWeather;
    private Deezer $deezer;

    public function __construct(OpenWeather $openWeather, Deezer $deezer)
    {
        $this->openWeather = $openWeather;
        $this->deezer = $deezer;
    }

    public function getArtists(float $temperature): Artists
    {
        if ($temperature < 10) {
            return $this->deezer->getArtistsByGenre("Classico");
        }

        if ($temperature < 14) {
            return $this->deezer->getArtistsByGenre("Rock");
        }

        if ($temperature < 30) {
            return $this->deezer->getArtistsByGenre("Pop");
        }

        return $this->deezer->getArtistsByGenre("House Party");
    }

    public function getTemperatureByCity(string $city): float
    {
        return $this->openWeather->getTemperatureByCity($city);
    }

    public function getTemperatureByLatitudeLongitude(
        string $latitude,
        string $longitude
    ): float {
        return $this->openWeather->getTemperatureByLatitudeAndLongitude($latitude, $longitude);
    }
}
