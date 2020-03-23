<?php

use Model\Entity\User;

/**
 * @var Closure $renderLayout 
 * @var User $user
 * @var Closure $path
 */

$body = function () use ($path, $user) {
?>
    Вы успешно авторизовались под логином <?= $user->getLogin() ?>
<?php
};

$renderLayout(
    'main_template.html.php',
    [
        'title' => 'Авторизация',
        'body' => $body,
    ]
);
