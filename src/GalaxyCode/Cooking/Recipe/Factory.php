<?php

namespace GalaxyCode\Cooking\Recipe;

use Exception;
use GalaxyCode\Cooking\Template\Factory as TemplateFactory;
use Parsedown;

class Factory
{
    /**
     * Base directry of all recipes
     *
     * @var string 
     */
    public string $base;

    /**
     * Parsedown instance for markdown parsing
     *
     * @var Parsedown
     */
    public Parsedown $markdown;

    /**
     * Template Factory instance
     *
     * @var TemplateFactory 
     */
    public TemplateFactory $templateFactory;

    public function __construct(string $base, TemplateFactory $templateFactory)
    {
        $this->base = $base;
        $this->markdown = new Parsedown();
        $this->markdown->setSafeMode(true);
        $this->templateFactory = $templateFactory;
    }

    /**
     * Creates new Recipe from markdown file 
     */
    public function make($recipe_file): Recipe
    {
        $name = explode('.md', $recipe_file)[0];
        $path = $this->base . DIRECTORY_SEPARATOR . trim($recipe_file, DIRECTORY_SEPARATOR);
        if (!is_file($path)) {
            throw new Exception("Recipe template {$path} does not exist");
        }
        $parsed = $this->markdown->parse(file_get_contents($path));
        return new Recipe($name, $parsed, $this->templateFactory);
    }
}
