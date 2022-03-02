<?php

namespace Galaxycode\Cooking\Recipe;

use Galaxycode\Cooking\Template\Factory as TemplateFactory;

class Recipe
{
    /**
     * Recipe name
     *
     * @var string
     */
    public string $name;

    /**
     * Recipe content
     *
     * @var string
     */
    public string $raw;

    /**
     * Compiled recipe
     *
     * @var string
     */
    public string $compiled;

    /**
     * Template Factory instance
     *
     * @var TemplateFactory
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
     *
     * @param mixed $template
     * @return self
     */
    public function compile($template): self
    {
        $this->compiled = $this->templateFactory->make($template, [
            'recipe' => $this->raw,
        ]);
        return $this;
    }
}
