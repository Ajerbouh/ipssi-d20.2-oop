<?php

declare(strict_types=1);

use Support\Factory;
use Support\Renderer;
use Support\Service;
use Zend\ServiceManager\Factory\InvokableFactory;
use App\Connect4\Service\Game as Connect4;
use App\Connect4\Factory\Game as ConnectFourFactory;
return [
    'games' => [
        'connect4' => Connect4::class,
    ],
    'service_manager' => [
        'factories' => [
            Renderer\Output::class => Factory\Renderer\Output::class,
            Service\ConnectFourGame::class => Factory\Service\ConnectFourGame::class,
            // InvokableFactory can be used when the service does not need any constructor argument
            Connect4::class => ConnectFourFactory::class,
            Service\PseudoRandomValue::class => InvokableFactory::class,
        ],
        'aliases' => [
            Service\RandomValue::class => Service\PseudoRandomValue::class,
        ],
    ]
];