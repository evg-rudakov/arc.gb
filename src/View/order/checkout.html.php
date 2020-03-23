<?php

use Model\Entity\Product;

/**
 * @var Closure $renderLayout 
 * @var Product[] $productList
 * @var bool $isLogged
 * @var Closure $path
 */

$body = function () use ($productList, $isLogged, $path) {
?>
    <form method="post">
        <table cellpadding="10">
            <tr>
                <td colspan="3" align="center">Покупка успешно совершена</td>
            </tr>
        </table>
    </form>
<?php
};

$renderLayout(
    'main_template.html.php',
    [
        'title' => 'Покупка',
        'body' => $body,
    ]
);
