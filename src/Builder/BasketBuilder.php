<?php


namespace Builder;


use Service\Billing\BillingInterface;
use Service\Billing\Checkout;
use Service\Communication\CommunicationInterface;
use Service\Discount\DiscountInterface;
use Service\User\SecurityInterface;

class BasketBuilder implements BasketBuilderInterface
{
    /**
     * @var ?array
     */
    private $products;

    /**
     * @var ?BillingInterface
     */
    private $billing;

    /**
     * @var ?DiscountInterface
     */
    private $discount;

    /**
     * @var ?CommunicationInterface
     */
    private $communication;

    /**
     * @var ?SecurityInterface
     */
    private $security;

    /**
     * @param array $products
     * @return BasketBuilder
     */
    public function setProducts(array $products): BasketBuilder
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @param BillingInterface $billing
     * @return BasketBuilder
     */
    public function setBilling(BillingInterface $billing): BasketBuilder
    {
        $this->billing = $billing;
        return $this;
    }

    /**
     * @param DiscountInterface $discount
     * @return BasketBuilder
     */
    public function setDiscount(DiscountInterface $discount): BasketBuilder
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * @param CommunicationInterface $communication
     * @return BasketBuilder
     */
    public function setCommunication(CommunicationInterface $communication): BasketBuilder
    {
        $this->communication = $communication;
        return $this;
    }

    /**
     * @param SecurityInterface $security
     * @return BasketBuilder
     */
    public function setSecurity(SecurityInterface $security): BasketBuilder
    {
        $this->security = $security;
        return $this;
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @return BillingInterface
     */
    public function getBilling(): BillingInterface
    {
        return $this->billing;
    }

    /**
     * @return DiscountInterface
     */
    public function getDiscount(): DiscountInterface
    {
        return $this->discount;
    }

    /**
     * @return CommunicationInterface
     */
    public function getCommunication(): CommunicationInterface
    {
        return $this->communication;
    }

    /**
     * @return SecurityInterface
     */
    public function getSecurity(): SecurityInterface
    {
        return $this->security;
    }

    /**
     * @return Checkout
     */
    public function checkoutProcess() {
        return new Checkout($this);
    }
}