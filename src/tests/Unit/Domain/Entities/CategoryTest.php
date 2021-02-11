<?php

namespace Tests\Unit\Domain\Entities;

use Domain\Entities\Category;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    public function testCreateCategoryCorrectly()
    {
        $category = Category::create("Pop");
        $this->assertInstanceOf(Category::class, $category);
    }

    public function testShouldBeEqualFromDifferentInstanceWithSameValue()
    {
        $category = Category::create("Pop");
        $anotherCategory = Category::create("Pop");
        $this->assertTrue($category->isEquals($anotherCategory));
    }
}
