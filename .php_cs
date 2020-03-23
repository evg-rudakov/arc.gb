<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude('bin');

return PhpCsFixer\Config::create()
    ->setFinder($finder)
    ->setRules([
        '@PSR1' => true,
        '@PSR2' => true,
    ]);