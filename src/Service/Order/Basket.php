<?php

declare(strict_types=1);

namespace Service\Order;

use Builder\Contract\OrderBuilderInterface;
use Model;
use Model\Entity\Product;
use Model\Repository\ProductRepository;
use Service\Billing\Exception\BillingException;
use Service\Billing\BillingInterface;
use Service\Billing\Transfer\Card;
use Service\Communication\Exception\CommunicationException;
use Service\Communication\CommunicationInterface;
use Service\Communication\Sender\Email;
use Service\Discount\DiscountInterface;
use Service\Discount\NullObject;
use Service\User\SecurityInterface;
use Service\User\Security;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Basket
{
    /**
     * Сессионный ключ списка всех продуктов корзины
     */
    private const BASKET_DATA_KEY = 'basket';

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @param SessionInterface $session
     */
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * Добавляем товар в заказ
     * @param int $productId
     * @return void
     */
    public function addProduct(int $productId): void
    {
        $basket = $this->session->get(static::BASKET_DATA_KEY, []);
        if (!in_array($productId, $basket, true)) {
            $basket[] = $productId;
            $this->session->set(static::BASKET_DATA_KEY, $basket);
        }
    }

    /**
     * Проверяем, лежит ли продукт в корзине или нет
     * @param int $productId
     * @return bool
     */
    public function isProductInBasket(int $productId): bool
    {
        return in_array($productId, $this->getProductIds(), true);
    }

    /**
     * Получаем информацию по всем продуктам в корзине
     * @return Product[]
     */
    public function getProductsInfo(): array
    {
        $productIds = $this->getProductIds();
        return $this->getProductRepository()->search($productIds);
    }

    /**
     * @return float
     */
    public function calculateProductsTotalPrice(): float
    {
        $totalPrice = 0;
        foreach ($this->getProductsInfo() as $product) {
            $totalPrice += $product->getPrice();
        }
        return $totalPrice;
    }

    /**
     * Оформление заказа
     * @param BasketBuilder $basketBuilder
     * @return void
     * @throws BillingException
     * @throws CommunicationException
     */
    public function checkout(BasketBuilder $basketBuilder): void
    {
        // здесь должна быть логика получения параметров платежа
        $billing = new Card();
        $basketBuilder->setBilling($billing);


        // Здесь должна быть некоторая логика получения информации о скидке
        // пользователя
        $discount = new NullObject();
        $basketBuilder->setDiscount($discount);


        // Здесь должна быть некоторая логика получения способа уведомления
        // пользователя о покупке
        $communication = new Email();
        $basketBuilder->setCommunication($communication);

        $security = new Security($this->session);
        $basketBuilder->setUser($security);
        $basketBuilder->setInvoice($this->calculateProductsTotalPrice());

        $checkOut = new CheckOutProcees($basketBuilder->build());
        $checkOut->process();
    }


    /**
     * Фабричный метод для репозитория Product
     * @return ProductRepository
     */
    protected function getProductRepository(): ProductRepository
    {
        return new ProductRepository();
    }

    /**
     * Получаем список id товаров корзины
     * @return array
     */
    private function getProductIds(): array
    {
        return $this->session->get(static::BASKET_DATA_KEY, []);
    }
}
