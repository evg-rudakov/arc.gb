<?php

declare(strict_types = 1);

namespace Service\Billing\Transfer;

use Service\Billing\BillingInterface;

class Card implements BillingInterface
{
    /**
     * @inheritdoc
     */
    public function pay(float $totalPrice): void
    {
        // Оплата кредитной или дебетовой картой
    }
}
