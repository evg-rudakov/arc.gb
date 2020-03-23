<?php

declare(strict_types = 1);

namespace Framework;

use Exception;
use InvalidArgumentException;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;

class Registry
{
    /**
     * @var ContainerBuilder
     */
    private static $containerBuilder;

    /**
     * Добавляем контейнер для работы реестра
     * @param ContainerBuilder $containerBuilder
     * @return void
     */
    public static function addContainer(ContainerBuilder $containerBuilder): void
    {
        static::$containerBuilder = $containerBuilder;
    }

    /**
     * Получаем данные из конфигурационного файла
     * @param string $name
     * @return mixed
     */
    public static function getDataConfig(string $name)
    {
        if (!static::$containerBuilder->hasParameter($name)) {
            throw new InvalidArgumentException('Unknown config variable ' . $name);
        }

        return static::$containerBuilder->getParameter($name);
    }

    /**
     * Рендерим страницу по названию роута
     * @param string name
     * @param array $parameters
     * @return string
     * @throws Exception
     */
    public static function getRoute(string $name, array $parameters = []): string
    {
        /** @var RouteCollection $routeCollection */
        $routeCollection = static::$containerBuilder->get('route_collection');

        $urlGenerator = new UrlGenerator($routeCollection, new RequestContext());
        try {
            return $urlGenerator->generate($name, $parameters);
        } catch (Exception $e) {
            throw new InvalidArgumentException('Unknown route name ' . $name);
        }
    }
}
