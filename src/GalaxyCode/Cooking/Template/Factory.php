<?php

namespace Galaxycode\Cooking\Template;


class Factory
{
    /**
     * Templates directory
     *
     * @var string 
     */
    public string $dir;

    public function __construct(string $dir)
    {
        $this->dir = $dir;
    }

    /**
     * Creates new Template
     *
     * @param string $file
     * @param mixed array $data
     * @return Template
     */
    public function make(string $file, array $data): Template
    {
        return new Template(file_get_contents($this->dir . DIRECTORY_SEPARATOR . $file), $data);
    }
}
