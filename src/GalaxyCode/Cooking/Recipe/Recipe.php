<?php

namespace GalaxyCode\Cooking\Recipe;

use GalaxyCode\Cooking\Template\Factory as TemplateFactory;
use GalaxyCode\Cooking\Template\Template;

class Recipe
{
    /**
     * Recipe name
     */
    public string $name;

    /**
     * Recipe content
     */
    public string $raw;

    /**
     * Compiled recipe
     */
    public string $template;

    /**
     * Template Factory instance
     */
    public TemplateFactory $templateFactory;

    public function __construct(string $name, string $raw, TemplateFactory $templateFactory)
    {
        $this->name = $name;
        $this->raw = $raw;
        $this->templateFactory = $templateFactory;
    }

    /**
     * Compiles recipe
     */
    public function compile($template): self
    {
        $this->template = $this->templateFactory->make($template, [
            'recipe' => $this->raw,
        ])->compile();
        return $this;
    }
}
