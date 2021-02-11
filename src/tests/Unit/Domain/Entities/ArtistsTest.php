<?php

namespace Tests\Unit\Domain\Entities;

use Domain\Entities\Artist;
use Domain\Entities\Artists;
use Domain\Entities\Category;
use Tests\TestCase;

class ArtistsTest extends TestCase
{
    public function testReturnEmptyArrayOnNewInstance()
    {
        $artists = new Artists();
        $this->assertEmpty($artists->toArray());
        $this->assertCount(0, $artists);
    }

    public function testReturnCorrectDataInArray()
    {
        $artists = new Artists();

        $artist = new Artist("Eminem", Category::create("Rap"));
        $artists->add($artist);

        $expected = [
            [
                "artistName" => "Eminem",
                "artistGenre" => "Rap"
            ]
        ];

        $this->assertEquals($expected, $artists->toArray());
        $this->assertCount(1, $artists);
    }
}
