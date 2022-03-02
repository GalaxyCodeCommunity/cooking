<?php

namespace Galaxycode\Cooking;

class Compiler
{

    public string $directory;

    public function __construct(string $directory)
    {
        $this->directory = $directory;
    }

    public function compile()
    {
        $recipes = [];
        foreach (scandir($this->directory) as $file) {
            // TODO recursive compilation
            $recipes[] = [];
        }
    }
}
