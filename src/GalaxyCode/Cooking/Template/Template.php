<?php

namespace Galaxycode\Cooking\Template;

class Template
{
    public string $raw;

    public array $data;

    public function __construct(string $raw, array $data)
    {
        $this->raw = $raw;
        $this->data = $data;
    }

    public function compile(): string
    {
        extract($this->data);
        ob_start();
        require $this->raw;
        return ob_get_clean();
    }
}
