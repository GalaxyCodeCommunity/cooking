<?php

namespace GalaxyCode\Cooking\Template;

class Template
{
    /**
     * Raw template
     *
     * @var string 
     */
    public string $raw;

    /**
     * Template data
     *
     * @var array
     */
    public array $data;

    public function __construct(string $raw, array $data)
    {
        $this->raw = $raw;
        $this->data = $data;
    }

    /**
     * Compiles template
     *
     * @return string
     */
    public function compile(): string
    {
        extract($this->data);
        ob_start();
        eval('?>' . $this->raw);
        return ob_get_clean();
    }
}
