<?php

declare(strict_types = 1);

namespace Service\Discount;

interface DiscountInterface
{
    /**
     * Получаем скидку в процентах
     * @return float
     */
    public function getDiscount(): float;
}
