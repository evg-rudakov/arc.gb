<?php


namespace Service\Product\Sorting;


use Model\Entity\Product;

class SortingByPrice implements SortingInterface
{

    function sort(array $productArray): array
    {
        function sort(array $productArray): array
        {
            usort($productArray, function (Product $a, Product $b){
                return $a->getPrice() <=> $b->getPrice();
            });

            return $productArray;

        }
    }
}
