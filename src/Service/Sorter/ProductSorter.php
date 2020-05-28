<?php


namespace Service\Sorter;


class ProductSorter
{
    public $comparator;

    /**
     * ProductSorter constructor.
     * @param $comparator
     */
    public function __construct($comparator)
    {
        $this->comparator = $comparator;
    }


    public function sort(array $items): array
    {
        usort($items, [$this->comparator, 'compare']);

        return $items;
    }
}