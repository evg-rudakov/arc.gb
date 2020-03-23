<?php

declare(strict_types = 1);

namespace Service\Billing\Transfer;

use Service\Billing\BillingInterface;

class BankTransfer implements BillingInterface
{
    /**
     * @inheritdoc
     */
    public function pay(float $totalPrice): void
    {
        // Проведение банковского транзакции (перевод с счёта на счёт)
    }
}
