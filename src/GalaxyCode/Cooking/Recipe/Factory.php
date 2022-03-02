<?php

namespace Galaxycode\Cooking\Recipe;

use Galaxycode\Cooking\Template\Factory as TemplateFactory;
use Parsedown;

class Factory
{
    public string $base;

    public Parsedown $markdown;

    public TemplateFactory $templateFactory;

    public function __construct(string $base, TemplateFactory $templateFactory)
    {
        $this->base = $base;
        $this->markdown = new Parsedown();
        $this->markdown->setSafeMode(true);
        $this->templateFactory = $templateFactory;
    }

    public function make($file): Recipe
    {
        $name = explode('.md', $file)[0];
        $parsed = $this->markdown->parse(file_get_contents($this->base . DIRECTORY_SEPARATOR . $file));
        return new Recipe($name, $parsed, $this->templateFactory);
    }
}
