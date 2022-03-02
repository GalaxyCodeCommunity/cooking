<?php

namespace Galaxycode\Cooking;

use Galaxycode\Cooking\Recipe\Factory as RecipeFactory;
use Galaxycode\Cooking\Template\Factory as TemplateFactory;

class Compiler
{

    /**
     * Recipes directory
     *
     * @var string
     */
    public string $directory;

    /**
     * Recipe Factory instance
     *
     * @var RecipeFactory 
     */
    public RecipeFactory $recipeFactory;

    /**
     * Template factory instance
     *
     * @var TemplateFactory
     */
    public TemplateFactory $templateFactory;

    public function __construct(string $directory)
    {
        $this->directory = $directory;
        $this->template_factory = new TemplateFactory($directory . DIRECTORY_SEPARATOR . 'resources');
        $this->recipe_factory = new RecipeFactory($directory, $this->templateFactory);

    }

    /**
     * Compiles all recipes and main page
     *
     * @param string $dist
     * @return void
     */
    public function compile(string $dist): void
    {
        $recipes = [];
        foreach (scandir($this->directory) as $file) {
            /**
     * Compiles all recipes and main page
     *
     * @param string $dist
     * @return void
     */
            $recipe = $this->recipeFactory->make($file)->compile('recipe.php');
            $recipes[] = $recipe;
            file_put_contents($dist . DIRECTORY_SEPARATOR . 'recipe' . DIRECTORY_SEPARATOR . $recipe->name . '.html', $recipe->compiled);
        }

        $welcome = $this->templateFactory->make('home.php', compact($recipes));

        file_put_contents($dist . DIRECTORY_SEPARATOR . 'index.html', $welcome);
    }
}
