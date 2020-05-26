<?php


namespace Service\Product\Sorting;


class SortingFactory
{
    public static function getSortingMethod(string $sortingType): SortingInterface {
        switch ($sortingType) {
            case "name":
                return new SortingByName();
            case "price":
                return new SortingByPrice();
            default:
                throw new \Exception("Unknown  Sorting type");
        }
    }
}
