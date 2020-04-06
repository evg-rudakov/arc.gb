<?php


namespace Service\Billing;


use Builder\BasketBuilderInterface;
use Service\Billing\Exception\BillingException;
use Service\Communication\Exception\CommunicationException;

class Checkout
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
     * Checkout constructor.
     * @param BasketBuilderInterface $basketBuilder
     */
    public function __construct(BasketBuilderInterface $basketBuilder)
    {
        $this->products = $basketBuilder->getProducts();
        $this->billing = $basketBuilder->getBilling();
        $this->discount = $basketBuilder->getDiscount();
        $this->communication = $basketBuilder->getCommunication();
        $this->security = $basketBuilder->getSecurity();
    }

    /**
     * Проведение всех этапов заказа
     * @return void
     * @throws BillingException
     * @throws CommunicationException
     */
    public function checkout(): void {
        $totalPrice = 0;
        foreach ($this->products as $product) {
            $totalPrice += $product->getPrice();
        }

        $discount = $this->discount->getDiscount();
        $totalPrice = $totalPrice - $totalPrice / 100 * $discount;

        $this->billing->pay($totalPrice);

        $user = $this->security->getUser();
        $this->communication->process($user, 'checkout_template');
    }
}