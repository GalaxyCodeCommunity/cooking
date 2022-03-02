<?php

namespace Galaxycode\Cooking\Recipe;

use Parsedown;

class Factory
{
    public string $base;

    public Parsedown $markdown;

    public function __construct(string $base)
    {
        $this->base = $base;
        $this->markdown = new Parsedown();
        $this->markdown->setSafeMode(true);
    }

    public function make($file): Recipe
    {
        $name = explode('.md', $file)[0];
        return new Recipe($name, file_get_contents($file));
    }
}
