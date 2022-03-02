<?php

namespace Galaxycode\Cooking\Template;


class Factory
{
    public string $dir;

    public function __construct(string $dir)
    {
        $this->dir = $dir;
    }

    public function make(string $file, array $data): Template
    {
        return new Template(file_get_contents($this->dir . DIRECTORY_SEPARATOR . $file), $data);
    }
}
