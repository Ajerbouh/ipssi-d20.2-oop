<?php
/**
 * Created by PhpStorm.
 * User: aminejerbouh
 * Date: 17/12/2018
 * Time: 06:26
 */
declare(strict_types=1);

namespace App;

interface Game extends \Support\Service\Game
{
    public static function playersFactory(int $numberOfPlayers): array;
}