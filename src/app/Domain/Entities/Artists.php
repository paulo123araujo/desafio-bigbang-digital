<?php

namespace Domain\Entities;

class Artists implements \Iterator, \Countable
{
    /** @var Artist[] $artists */
    private array $artists;
    private int $pos;

    public function __construct()
    {
        $this->pos = 0;
        $this->artists = [];
    }

    public function add(Artist $artist): void
    {
        $this->artists[] = $artist;
    }

    public function toArray(): array
    {
        if (empty($this->artists)) {
            return [];
        }

        return array_map(function (Artist $artist) {
            return [
                "artistName" => $artist->getName(),
                "artistGenre" => $artist->getCategory()->getName()
            ];
        }, $this->artists);
    }

    public function key(): int
    {
        return $this->pos;
    }

    public function valid(): bool
    {
        return isset($this->artists[$this->pos]);
    }

    public function current(): Artist
    {
        return $this->artists[$this->pos];
    }

    public function next()
    {
        $this->pos++;
    }

    public function rewind()
    {
        $this->pos = 0;
    }

    public function count(): int
    {
        return count($this->artists);
    }
}
