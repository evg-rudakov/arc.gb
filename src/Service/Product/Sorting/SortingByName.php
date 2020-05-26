<?php


namespace Service\Product\Sorting;


use Model\Entity\Product;

class SortingByName implements SortingInterface
{


    function sort(array $productArray): array
    {
        usort($productArray, function (Product $a, Product $b){
            return $a->getName() <=> $b->getName();
        });

        return $productArray;

    }
}
