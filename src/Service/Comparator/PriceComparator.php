<?php


namespace Service\Comparator;


class PriceComparator implements ComparatorInterface
{


    public function compare($a, $b): int
    {
        return $a->getPrice() <=> $b->getPrice();
    }
}