<?php
/**
 * @var Closure $path
 * @var boolean $isAuth
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>On-line курсы GeekStars | <?= $title ?? '' ?></title>
</head>
<body>
    <table width="100%">
        <tr>
            <td align="center">
                <table cellpadding="0" cellspacing="0" border="1" width="1024px">
                    <tr>
                        <td colspan="2" align="center" height="50">On-line магазин GeekStarts</td>
                    </tr>
                    <tr valign="top">
                        <td width="150">
                            <table cellspacing="10">
                                <tr><td><a href="<?= $path('index') ?>">Главная</a></td></tr>
                                <tr><td><a href="<?= $path('product_list') ?>">Товары</a></td></tr>
                                <tr><td><a href="<?= $path('order_info') ?>">Корзина</a></td></tr>
                                <?php if (!$isAuth) : ?>
                                    <tr><td><a href="<?= $path('user_authentication') ?>">Авторизация</a></td></tr>
                                <?php else: ?>
                                    <tr><td><a href="<?= $path('logout') ?>">Выход</a></td></tr>
                                <?php endif; ?>
                            </table>
                        </td>
                        <td align="center"><br/><?= isset($body) && $body instanceof Closure ? $body() : '' ?><br/></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>