<?php

namespace Infra\Services;

use Illuminate\Support\Facades\Http;

class OpenWeather
{
    private string $baseUrl = "api.openweathermap.org/data/2.5/weather";

    public function getTemperatureByCity(string $city): float
    {
        $appId = config("openweather.apiKey");
        $uri = sprintf(
            "%s?q=%s&APPID=%s&units=metric",
            $this->baseUrl,
            $city,
            $appId
        );

        $response = Http::get($uri);

        if ($response->status() !== 200) {
            throw new \Exception("Erro ao fazer a requisição à api do open weather.");
        }

        return (float) $response->json()["main"]["temp"];
    }

    public function getTemperatureByLatitudeAndLongitude(
        string $latitude,
        string $longitude
    ): float {

        $uri = sprintf(
            "%s?lat=%s&lon=%s&APPID=&units=metric",
            $this->baseUrl,
            $latitude,
            $longitude,
            env("OPENWEATHER_API_KEY")
        );

        $response = Http::get($uri);

        dd($response);

        if ($response->status() !== 200) {
            throw new \Exception("Erro ao fazer a requisição à api do open weather.");
        }

        return (float) $response->json()["main"]["temp"];
    }
}
