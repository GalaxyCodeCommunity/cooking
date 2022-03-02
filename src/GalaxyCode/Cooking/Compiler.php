<?php

namespace Galaxycode\Cooking;

use Galaxycode\Cooking\Recipe\Factory as RecipeFactory;
use Galaxycode\Cooking\Template\Factory as TemplateFactory;

class Compiler
{

    public string $directory;

    public RecipeFactory $recipeFactory;

    public TemplateFactory $templateFactory;

    public function __construct(string $directory)
    {
        $this->directory = $directory;
        $this->template_factory = new TemplateFactory($directory . DIRECTORY_SEPARATOR . 'resources');
        $this->recipe_factory = new RecipeFactory($directory, $this->templateFactory);

    }

    public function compile(string $dist)
    {
        $recipes = [];
        foreach (scandir($this->directory) as $file) {
            // TODO recursive compilation
            $recipe = $this->recipeFactory->make($file)->compile('recipe.php');
            $recipes[] = $recipe;
            file_put_contents($dist . DIRECTORY_SEPARATOR . 'recipe' . DIRECTORY_SEPARATOR . $recipe->name . '.html', $recipe->compiled);
        }

        $welcome = $this->templateFactory->make('home.php', compact($recipes));

        file_put_contents($dist . DIRECTORY_SEPARATOR . 'index.html', $welcome);
    }
}
