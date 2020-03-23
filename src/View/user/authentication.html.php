<?php

use Model\Entity\Product;

/**
 * @var Closure $renderLayout 
 * @var Product[] $productList
 * @var string $error
 * @var Closure $path
 */

$body = function () use ($path, $error) {
?>
    <form action="<?= $path('user_authentication') ?>" method="post">
        Логин: <input name="login" type="text" /><br />
        Пароль: <input name="password" type="password" /><br />
        <input type="submit" value="Войти" />
    </form>
    <?= $error ?>
    <br>
    <table>
        <thead>
            <tr>
                <th>Login</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>root</td>
                <td>1234</td>
            </tr>
            <tr>
                <td>doejohn</td>
                <td>qwerty</td>
            </tr>
            <tr>
                <td>i**3</td>
                <td>PaSsWoRd</td>
            </tr>
            <tr>
                <td>testok</td>
                <td>testss</td>
            </tr>
        </tbody>
    </table>
<?php
};

$renderLayout(
    'main_template.html.php',
    [
        'title' => 'Авторизация',
        'body' => $body,
    ]
);
