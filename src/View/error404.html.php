<?php

/**
 * @var Closure $renderLayout 
 */

$body = function () {
?>
    <h1>404</h1>
    <br />
    <h1>Страница не найдена</h1>
<?php
};


$renderLayout(
    'main_template.html.php',
    [
        'title' => '404 страница не найдена',
        'body' => $body,
    ]
);
