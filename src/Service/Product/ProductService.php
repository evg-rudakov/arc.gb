<?php

declare(strict_types = 1);

namespace Service\Product;

use Model;
use Model\Entity\Product;
use Model\Repository\ProductRepository;
use Service\Comparator\NameComparator;
use Service\Comparator\PriceComparator;
use Service\Sorter\ProductSorter;

class ProductService
{
    /**
     * Получаем информацию по конкретному продукту
     * @param int $id
     * @return ProductRepository
     */
    public function getInfo(int $id): ?ProductRepository
    {
        $product = $this->getProductRepository()->search([$id]);
        return count($product) ? $product[0] : null;
    }

    /**
     * Получаем все продукты
     * @param string $sortType
     * @return Product[]
     */
    public function getAll(string $sortType): array
    {
        $productList = $this->getProductRepository()->fetchAll();

        $comparators = [
            'price' => new PriceComparator(),
            'name' => new NameComparator()
        ];

        $productList = (new ProductSorter($comparators[$sortType]))->sort($productList);

        // Применить паттерн Стратегия
        // $sortType === 'price'; // Сортировка по цене
        // $sortType === 'name'; // Сортировка по имени

        return $productList;
    }

    /**
     * Фабричный метод для репозитория Product
     * @return ProductRepository
     */
    protected function getProductRepository(): ProductRepository
    {
        return new ProductRepository();
    }
}
