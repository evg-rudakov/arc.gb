<?php

declare(strict_types = 1);

namespace Service\Discount;

class PromoCode implements DiscountInterface
{
    /**
     * @var string
     */
    private $promoCode;

    /**
     * @param string $promoCode
     */
    public function __construct(string $promoCode)
    {
        $this->promoCode = $promoCode;
    }

    /**
     * @inheritdoc
     */
    public function getDiscount(): float
    {
        // Получаем по промокоду размер скидки на заказ в процентах
        // $discount = $this->find($this->promoCode)->discount();
        $discount = 5.50;

        // Запрос в систему хранения промокодов для пометки данного кода как
        // использованный
        // $this->find($this->promoCode)->deactivate();

        return $discount;
    }
}
