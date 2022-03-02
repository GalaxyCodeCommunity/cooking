<?php

namespace Galaxycode\Cooking\Recipe;

use Galaxycode\Cooking\Template\Factory as TemplateFactory;
use Galaxycode\Cooking\Template\Template;

class Recipe
{

    public string $name;

    public string $raw;

    public string $compiled;

    public TemplateFactory $templateFactory;

    public function __construct(string $name, string $raw, TemplateFactory $templateFactory)
    {
        $this->name = $name;
        $this->raw = $raw;
        $this->templateFactory = $templateFactory;
    }

    public function compile($template): self
    {
        $this->compiled = $this->templateFactory->make($template, [
            'recipe' => $this->raw,
        ]);
        return $this;
    }
}
