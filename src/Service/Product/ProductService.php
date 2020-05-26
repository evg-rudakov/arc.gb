<?php

declare(strict_types = 1);

namespace Service\Product;

use Model;
use Model\Entity\Product;
use Model\Repository\ProductRepository;
use Service\Product\Sorting\SortingFactory;
use Service\Product\Sorting\SortingInterface;

class ProductService
{
    /**
     * Получаем информацию по конкретному продукту
     * @param int $id
     * @return Product|null
     */
    public function getInfo(int $id): ?Product
    {
        $product = $this->getProductRepository()->search([$id]);
        return count($product) ? $product[0] : null;
    }

    /**
     * Получаем все продукты
     * @param string $sortType
     * @return Product[]
     * @throws \Exception
     */
    public function getAll(string $sortType): array
    {
        $productList = $this->getProductRepository()->fetchAll();
        $sorter = SortingFactory::getSortingMethod($sortType);
        return $sorter->sort($productList);
    }

  /*Фабричный метод применяется для создания репозитория
  на данный момент он возвращает базовый репозиторий но при расшерения проэкта можно контролировать создать общий интерфейс
  и создовать различные репозитории в зависимости от источника.*/

    /**
     * Фабричный метод для репозитория Product
     * @return ProductRepository
     */
    protected function getProductRepository(): ProductRepository
    {
        return new ProductRepository();
    }
}
