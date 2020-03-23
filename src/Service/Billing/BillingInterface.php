<?php

declare(strict_types = 1);

namespace Service\Billing;

use Service\Billing\Exception\BillingException;

interface BillingInterface
{
    /**
     * Рассчёт стоимости доставки заказа
     * @param float $totalPrice
     * @return void
     * @throws BillingException
     */
    public function pay(float $totalPrice): void;
}
