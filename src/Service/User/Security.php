<?php

declare(strict_types=1);

namespace Service\User;

use Model\Entity\User;
use Model\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Security implements SecurityInterface
{
    private const SESSION_USER_IDENTITY = 'userId';

    /**
     * @var SessionInterface
     */
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * @inheritdoc
     */
    public function getUser(): ?User
    {
        $userId = $this->session->get(self::SESSION_USER_IDENTITY);
        if (!$userId) {
            return null;
        }

        return (new UserRepository())-> findById($userId);
    }

    /**
     * @inheritdoc
     */
    public function isLogged(): bool
    {
        return $this->getUser() instanceof User;
    }

    /**
     * @inheritdoc
     */
    public function authentication(string $login, string $password): bool
    {
        $user = $this->getUserRepository()->findByLogin($login);

        if ($user === null) {
            return false;
        }

        if (!password_verify($password, $user->getPasswordHash())) {
            return false;
        }

        $this->session->set(self::SESSION_USER_IDENTITY, $user->getId());

        // Здесь могут выполняться другие действия связанные с аутентификацией
        // пользователя

        return true;
    }

    /**
     * @inheritdoc
     */
    public function logout(): void
    {
        $this->session->set(self::SESSION_USER_IDENTITY, null);

        // Здесь могут выполняться другие действия связанные с разлогиниванием
        // пользователя
    }

    /**
     * Фабричный метод для репозитория User
     * @return UserRepository
     */
    protected function getUserRepository(): UserRepository
    {
        return new UserRepository();
    }
}
