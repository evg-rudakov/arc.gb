<?php

use Model\Entity\Product;

/**
 * @var Closure $renderLayout 
 * @var Product[] $productList
 * @var bool $isLogged
 * @var float $totalPrice
 * @var Closure $path
 */

$body = function () use ($productList, $isLogged, $totalPrice, $path) {
?>
    <form method="post">
        <table cellpadding="10">
            <tr>
                <td colspan="3" align="center">Корзина</td>
            </tr>
            <?php for ($i = 0; $i < count($productList); $i++): ?>
                <tr>
                    <td><?= $i + 1 ?>.</td>
                    <td><?= $productList[$i]->getName() ?></td>
                    <td><?= $productList[$i]->getPrice() ?> руб</td>
                    <td><input type="button" value="Удалить" /></td>
                </tr>
            <?php endfor; ?>
            <tr>
                <td colspan="3" align="right">Итого: <?= $totalPrice ?> рублей</td>
            </tr>
            <?php if ($totalPrice > 0): ?>
                <?php if ($isLogged): ?>
                    <tr>
                        <td colspan="3" align="center"><input type="submit" value="Оформить заказ" /></td>
                    </tr>
                <?php else: ?>
                    <tr>
                        <td colspan="4" align="center">Для оформления заказа, <a href="<?= $path('user_authentication') ?>">авторизуйтесь</a></td>
                    </tr>
                <?php endif; ?>
            <?php endif; ?>
        </table>
    </form>
<?php
};

$renderLayout(
    'main_template.html.php',
    [
        'title' => 'Корзина',
        'body' => $body,
    ]
);
