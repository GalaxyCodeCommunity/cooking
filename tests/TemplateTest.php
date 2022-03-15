<?php


use GalaxyCode\Cooking\Template\Template;
use GalaxyCode\Cooking\Template\Factory as TemplateFactory;

it('compiles template', function() {
    $template = new Template('<h1><?= $foo ?></h1>', ['foo' => 'bar']); 
    expect($template->compile())
        ->toBe('<h1>bar</h1>');
});

it('compiles template from file', function() {
    $factory = new TemplateFactory(__DIR__);
    $template = $factory->make('/fixtures/template.phtml', ['foo' => 'bar']);
    expect($template->raw)
        ->toBe('<h1><?= $foo ?></h1>');

    $template = $factory->make('fixtures/template.phtml', ['foo' => 'bar']);
    expect($template->raw)
        ->toBe('<h1><?= $foo ?></h1>');
});

it('throws error', function() {
    $factory = new TemplateFactory(__DIR__);
    expect(function() use ($factory){
        $factory->make('klobna', []);
    })->toThrow(Exception::class);
});
