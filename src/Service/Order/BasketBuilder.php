<?php
/**
 * Created by PhpStorm.
 * User: rogozhuk
 * Date: 05.04.20
 * Time: 15:21
 */

namespace Service\Order;

use Service\Discount\NullObject;
use Service\Discount\PromoCode;
use Service\Discount\VipDiscount;

class BasketBuilder implements Builder
{
    private $basket;

    public function discountNull(): float
    {
        $discount = new NullObject();
        return $discount->getDiscount();
    }

    public function discountPromo($code): float
    {
        $discount = new PromoCode($code);
        return $discount->getDiscount();
    }

    public function discountVip($user): float
    {
        $discount = new VipDiscount($user);
        return $discount->getDiscount();
    }

    public function getBasket(): Basket
    {
        $result = $this->basket;

        return $result;
    }
}