<?php

namespace GalaxyCode\Cooking\Template;

use Exception;

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
        $path = $this->dir . DIRECTORY_SEPARATOR . trim($file, DIRECTORY_SEPARATOR);
        if (!is_file($path)) {
            throw new Exception("File {$path} does not exist");
        }
        return new Template(trim(file_get_contents($path)), $data);
    }
}
