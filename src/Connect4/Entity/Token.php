<?php
/**
 * Created by PhpStorm.
 * User: aminejerbouh
 * Date: 14/12/2018
 * Time: 14:44
 */
declare(strict_types=1);
namespace App\Connect4\Entity;


final class Token
{

    private const EMPTYSLOT = "*";
    private $token;


    /**
     * Token constructor.
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function __toString(): string
    {
        return $this->token;
    }

    public static function createEmptySlot(): Token
    {
        return new self(self::EMPTYSLOT);
    }


    public function token()
    {
        return $this->token;
    }

}