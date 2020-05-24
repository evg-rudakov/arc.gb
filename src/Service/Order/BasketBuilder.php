<?php


namespace Service\Order;


use Service\Billing\BillingInterface;
use Service\Communication\CommunicationInterface;
use Service\Discount\DiscountInterface;
use Service\User\SecurityInterface;

class BasketBuilder
{

    protected $discount;
    protected $billing;
    protected $security;
    protected $communication;
    private $invoice;


    public function setBilling(BillingInterface $billing)
    {
        $this->billing = $billing;
        return $this;
    }

    public function setDiscount(DiscountInterface $discount)
    {
        $this->discount = $discount;
        return $this;
    }

    public function setUser(SecurityInterface $security)
    {
        $this->security = $security;
        return $this;
    }

    public function setCommunication(CommunicationInterface $communication)
    {
        $this->communication = $communication;
        return $this;
    }

    /**
     * @param mixed $invoice
     */
    public function setInvoice($invoice): void
    {
        $this->invoice = $invoice;
    }

    /**
     * @return mixed
     */
    public function getBilling()
    {
        return $this->billing;
    }

    /**
     * @return mixed
     */
    public function getCommunication()
    {
        return $this->communication;
    }

    /**
     * @return mixed
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @return mixed
     */
    public function getSecurity()
    {
        return $this->security;
    }

    /**
     * @return mixed
     */
    public function getInvoice()
    {
        return $this->invoice;
    }


    public function build(): BasketBuilder
    {
        return $this;
    }


}
