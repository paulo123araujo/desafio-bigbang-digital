<?php

namespace Tests\Unit\Domain\Entities;

use Domain\Entities\{Artist, Category};
use Tests\TestCase;

class ArtistTest extends TestCase
{
    public function testCreateArtistCorrectly()
    {
        $artist = new Artist("Eminem", Category::create("Rap"));
        $this->assertInstanceOf(Artist::class, $artist);
    }

    public function testShouldBeTrueTwoDifferentInstancesWithSameValue()
    {
        $artist = new Artist("Eminem", Category::create("Rap"));
        $anotherArtist = new Artist("Eminem", Category::create("Rap"));

        $this->assertTrue($artist->isEquals($anotherArtist));
    }

    public function testShouldBeFalseTwoDifferentInstancesWithDifferentValue()
    {
        $artist = new Artist("Eminem", Category::create("Rap"));
        $artist1 = new Artist("Tyler The Creator", Category::create("Rap"));

        $artist2 = new Artist("Eminem", Category::create("Pop"));

        $this->assertFalse($artist->isEquals($artist1));
        $this->assertFalse($artist->isEquals($artist2));
    }
}
