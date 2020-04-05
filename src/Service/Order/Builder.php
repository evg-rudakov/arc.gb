<?php
/**
 * Created by PhpStorm.
 * User: rogozhuk
 * Date: 05.04.20
 * Time: 15:22
 */

namespace Service\Order;

use Model\Entity\User;

interface Builder
{
    public function discountNull(): float;

    public function discountPromo(string $code): float;

    public function discountVip(User $user): float;
}