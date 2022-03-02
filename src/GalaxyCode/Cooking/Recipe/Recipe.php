<?php

namespace Galaxycode\Cooking\Recipe;

use Galaxycode\Cooking\Template;

class Recipe
{

    public string $name;

    public string $raw;

    public function __construct(string $name, string $raw)
    {
        
    }

    public function compile(string $template): Template
    {
        
    }
}
