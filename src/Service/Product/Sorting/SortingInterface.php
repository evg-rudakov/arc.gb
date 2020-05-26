<?php


namespace Service\Product\Sorting;


interface SortingInterface
{
    function sort(array $productArray):array;
}
