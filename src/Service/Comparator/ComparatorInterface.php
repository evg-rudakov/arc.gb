<?php


namespace Service\Comparator;


interface ComparatorInterface
{
    public function compare($a, $b): int;
}