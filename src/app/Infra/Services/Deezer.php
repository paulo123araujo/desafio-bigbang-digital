<?php

namespace Infra\Services;

use Domain\Entities\{Artist, Artists, Category};
use Illuminate\Support\Facades\Http;

class Deezer
{
    private array $genres;

    public function __construct()
    {
        $this->genres = [
            "Rock" => 152,
            "Pop" => 132,
            "Classico" => 98,
            "House Party" => 113
        ];
    }

    protected string $baseUrl = "https://api.deezer.com";

    public function getArtistsByGenre(string $genre): Artists
    {
        $artists = new Artists();

        $uri = sprintf(
            "%s/genre/%s/artists",
            $this->baseUrl,
            $this->getGenreIdByName($genre)
        );

        $response = Http::get($uri);


        if (isset($response->json()["error"])) {
            throw new \Exception("Ocorreu um erro com a Api do Deezer.");
        }


        $data = $response->json()["data"];
        foreach ($data as $artist) {
            $artists->add(new Artist($artist["name"], Category::create("$genre")));
        }

        return $artists;
    }

    public function getGenreIdByName(string $name): int
    {
        return $this->genres[$name];
    }
}
