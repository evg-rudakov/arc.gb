<?php


namespace Service\Comparator;


class NameComparator implements ComparatorInterface
{

    public function compare($a, $b): int
    {
        return $a->getName() <=> $b->getName();
    }
}