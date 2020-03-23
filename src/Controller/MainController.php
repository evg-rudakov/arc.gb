<?php

declare(strict_types = 1);

namespace Controller;

use Framework\BaseController;
use Symfony\Component\HttpFoundation\Response;

class MainController extends BaseController
{
    /**
     * Главная страница
     * @return Response
     */
    public function indexAction(): Response
    {
        return $this->render('main/index.html.php');
    }
}
