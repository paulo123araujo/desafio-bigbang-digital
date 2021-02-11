<?php

namespace Tests\Unit\Infra\Services;

use Domain\Entities\Artists;
use Infra\Services\Deezer;
use Tests\TestCase;

class DeezerTest extends TestCase
{
    public function testGetGenreIdByNameCorrectly()
    {
        $deezer = new Deezer();
        $expected = 152;

        $tested = $deezer->getGenreIdByName("Rock");

        $this->assertEquals($expected, $tested);
    }

    public function testCallApiCorrectly()
    {
        $deezer = new Deezer();

        $tested = $deezer->getArtistsByGenre("Rock");

        $expected = [
            [
                "artistName" => "Charlie Brown Jr.",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Coldplay",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Legião Urbana",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Queen",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "AC/DC",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Engenheiros do Hawaii",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Foo Fighters",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Boyce Avenue",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "The Beatles",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "System of a Down",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "U2",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Bon Jovi",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Pearl Jam",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Pink Floyd",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Guns N' Roses",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Jack Johnson",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Iron Maiden",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Nirvana",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Nickelback",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Led Zeppelin",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Raimundos",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Dire Straits",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "SAINt JHN",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "CPM 22",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Creedence Clearwater Revival",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Os Paralamas do Sucesso",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Evanescence",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "The Rolling Stones",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Audioslave",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Scorpions",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Creed",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "The Offspring",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Titãs",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Detonautas Roque Clube",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "R.E.M.",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Avenged Sevenfold",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Black Sabbath",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Bring Me the Horizon",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "The Cranberries",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Aerosmith",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "NX Zero",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Phil Collins",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "blink-182",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "KISS",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Five Finger Death Punch",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Ramones",
                "artistGenre" => "Rock"
            ],
            [
                "artistName" => "Rage Against the Machine",
                "artistGenre" => "Rock"
            ]
        ];

        $this->assertInstanceOf(Artists::class, $tested);
        $this->assertEquals($expected, $tested->toArray());
    }

    public function testShouldThrowException()
    {
        $deezer = new Deezer();

        $this->expectException(\Exception::class);

        $tested = $deezer->getArtistsByGenre("Wrong");
    }
}
