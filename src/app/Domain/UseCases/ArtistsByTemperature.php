<?php

namespace Domain\UseCases;

use Domain\Entities\Artists;

interface ArtistsByTemperature
{
    public function getArtists(float $temperature): Artists;
}
