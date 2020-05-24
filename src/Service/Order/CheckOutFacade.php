<?php


namespace Service\Order;


use Service\Billing\Transfer\Card;
use Service\Communication\Sender\Email;
use Service\Discount\NullObject;
use Service\User\Security;

class CheckOutFacade
{
    public function setUpCheckOut(BasketBuilder $basketBuilder, $session, $totalPrice)
    {
          $basket = $basketBuilder->setBilling($this->getBilling())
                                    ->setDiscount($this->getDiscount())
                                    ->setCommunication($this->getCommunication())
                                    ->setUser($this->getSecurity($session))
                                    ->setInvoice($totalPrice)
                                    ->build();

        $checkOut = new CheckOutProcess($basket);
        $checkOut->process();
    }

    private function getBilling()
    {
        // здесь должна быть логика получения параметров платежа
        return new Card();
    }

    private function getDiscount()
    {
        // Здесь должна быть некоторая логика получения информации о скидке
        // пользователя
        return new NullObject();
    }

    private function getCommunication()
    {
        // Здесь должна быть некоторая логика получения способа уведомления
        // пользователя о покупке
        return new Email();
    }

    private function getSecurity($session)
    {
        return new Security($session);
    }

}
