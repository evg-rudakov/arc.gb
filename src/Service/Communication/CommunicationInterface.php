<?php

declare(strict_types=1);

namespace Service\Communication;

use Model\Entity\User;
use Service\Communication\Exception\CommunicationException;

interface CommunicationInterface
{
    /**
     * Точка входа по формированию и отправке сообщения пользователю
     * @param User $user
     * @param string $templateName
     * @param array $params
     * @return void
     * @throws CommunicationException
     */
    public function process(
        User $user,
        string $templateName,
        array $params = []
    ): void;
}
