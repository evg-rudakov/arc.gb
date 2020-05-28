<?php
namespace Commands;


use Symfony\Component\HttpFoundation\Request;

interface CommandInterface
{
    public function execute(Request $request);
}