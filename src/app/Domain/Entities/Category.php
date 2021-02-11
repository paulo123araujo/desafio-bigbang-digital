<?php

namespace Domain\Entities;

class Category
{
    private string $name;

    private function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function create(string $name): Category
    {
        return new self($name);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isEquals(Category $anotherCategory): bool
    {
        return $this->name === $anotherCategory->getName();
    }
}
