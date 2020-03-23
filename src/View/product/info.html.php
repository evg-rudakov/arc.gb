<?php

use Model\Entity\Product;

/**
 * @var Closure $renderLayout 
 * @var Product $productInfo
 * @var bool $isInBasket
 * @var Closure $path
 */

$body = function () use ($productInfo, $isInBasket, $path) {
?>
    Супер <?= $productInfo->getName() ?> курс всего за <?= $productInfo->getPrice() ?> руб.
    <br/><br/>
    <form method="post">
        <input name="product" type="hidden" value="<?= $productInfo->getId() ?>" />
    <?php if ($isInBasket): ?>
        Курс уже находится в корзине.<br/>
    <?php else: ?>
        <input type="submit" value="Положить в корзину" />
    <?php endif; ?>
    </form>
    <br/>
    <a href="<?= $path('product_list') ?>">Вернуться к списку</a>
<?php
};

$renderLayout(
    'main_template.html.php',
    [
        'title' => 'Курс ' . $productInfo->getName(),
        'body' => $body,
    ]
);
