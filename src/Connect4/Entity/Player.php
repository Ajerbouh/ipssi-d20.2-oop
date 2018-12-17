<?php
/**
 * Created by PhpStorm.
 * User: aminejerbouh
 * Date: 14/12/2018
 * Time: 13:00
 */
declare(strict_types=1);
namespace App\Connect4\Entity;

final class Player implements Participant
{
    private $id;

    /**
     * Player constructor.
     * @param $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function id(): int
    {
        return (int) $this->id;
    }
}