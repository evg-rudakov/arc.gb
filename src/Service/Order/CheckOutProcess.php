<?php


namespace Service\Order;


use Service\Billing\BillingInterface;
use Service\Billing\Exception\BillingException;
use Service\Communication\CommunicationInterface;
use Service\Communication\Exception\CommunicationException;
use Service\Discount\DiscountInterface;
use Service\User\SecurityInterface;

class CheckOutProcess
{
    private $discount;
    private $billing;
    private $security;
    private $communication;
    private $invoice;

    public function __construct(BasketBuilder $builder)
    {
        $this->discount = $builder->getDiscount();
        $this->billing = $builder->getBilling();
        $this->security = $builder->getSecurity();
        $this->communication = $builder->getCommunication();
        $this->invoice = $builder->getInvoice();
    }

    public function process():void
    {
        $discount = $this->discount->getDiscount();
        $totalPrice = $this->invoice - $this->invoice / 100 * $discount;
        $this->billing->pay($totalPrice);
        $user = $this->security->getUser();
        $this->communication->process($user, 'checkout_template');
    }


}
