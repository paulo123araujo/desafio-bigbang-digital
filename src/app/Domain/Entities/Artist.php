<?php

namespace Domain\Entities;

class Artist
{
    private string $name;
    private Category $category;

    public function __construct(string $name, Category $category)
    {
        $this->name = $name;
        $this->category = $category;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function isEquals(Artist $artist): bool
    {
        return $this->name == $artist->getName() && $this->category->isEquals($artist->getCategory());
    }
}
