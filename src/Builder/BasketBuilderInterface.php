<?php


namespace Builder;


use Service\Billing\BillingInterface;
use Service\Billing\Checkout;
use Service\Communication\CommunicationInterface;
use Service\Discount\DiscountInterface;
use Service\User\SecurityInterface;

interface BasketBuilderInterface
{
    /**
     * @param array $products
     * @return BasketBuilder
     */
    public function setProducts(array $products): BasketBuilder;

    /**
     * @param BillingInterface $billing
     * @return BasketBuilder
     */
    public function setBilling(BillingInterface $billing): BasketBuilder;

    /**
     * @param DiscountInterface $discount
     * @return BasketBuilder
     */
    public function setDiscount(DiscountInterface $discount): BasketBuilder;

    /**
     * @param CommunicationInterface $communication
     * @return BasketBuilder
     */
    public function setCommunication(CommunicationInterface $communication): BasketBuilder;

    /**
     * @param SecurityInterface $security
     * @return BasketBuilder
     */
    public function setSecurity(SecurityInterface $security): BasketBuilder;

    /**
     * @return Checkout
     */
    public function checkoutProcess();

    /**
     * @return array
     */
    public function getProducts(): array;

    /**
     * @return BillingInterface
     */
    public function getBilling(): BillingInterface;

    /**
     * @return DiscountInterface
     */
    public function getDiscount(): DiscountInterface;

    /**
     * @return CommunicationInterface
     */
    public function getCommunication(): CommunicationInterface;

    /**
     * @return SecurityInterface
     */
    public function getSecurity(): SecurityInterface;
}