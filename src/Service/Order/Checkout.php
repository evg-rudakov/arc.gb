<?php
/**
 * Created by PhpStorm.
 * User: rogozhuk
 * Date: 05.04.20
 * Time: 15:51
 */

namespace Service\Order;

use Service\Billing\Transfer\Card;
use Service\Communication\Sender\Email;
use Service\Discount\DiscountInterface;
use Service\User\Security;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Checkout
{
    /**
     * @var $discount Builder
     */
    private $discount;
    private $items;
    private $session;

    public function __construct(Builder $discount, SessionInterface $session, array $items)
    {
        $this->discount = $discount;
        $this->session = $session;
        $this->items = $items;
    }

    public function checkoutProcess()
    {
        // Здесь должна быть некоторая логика выбора способа платежа
        $billing = new Card();

        $totalPrice = 0;
        // Необходима проверка скидочного номера
        // Vip вообще пока логика не ясна
        foreach ($this->items as $item) {
            $totalPrice += $item->getPrice();
        }

        // Здесь должна быть некоторая логика получения способа уведомления
        // пользователя о покупке
        $communication = new Email();

        $security = new Security($this->session);

        $totalPrice = $totalPrice - ($totalPrice / 100 * $this->discount->discountNull());
        $billing->pay($totalPrice);
        $user = $security->getUser();
        $communication->process($user, 'checkout_template');
    }
}