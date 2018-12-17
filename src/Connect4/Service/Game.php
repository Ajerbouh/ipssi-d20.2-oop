<?php
/**
 * Created by PhpStorm.
 * User: aminejerbouh
 * Date: 17/12/2018
 * Time: 06:08
 */
declare(strict_types=1);

namespace App\Connect4\Service;

use App\Connect4\Entity\Token;
use App\Connect4\Entity\Player;
use App\Connect4\Entity\Participant;
use App\Game as GameInterface;
use RuntimeException;
use Support\Renderer\Output;
use Support\Service\RandomValue;

final class Game implements GameInterface
{
    private const BOARDROW = 7;
    private const BOARDCOLUMN = 6;
    private $board;
    private $output;
    private $randomValueGenerator;
    private $participants;

    /**
     * Game constructor.
     * @param $output
     * @param $randomValueGenerator
     * @param $participants
     */
    public function __construct(Output $output, RandomValue $randomValueGenerator, Participant ...$participants)
    {
        $this->output = $output;
        $this->randomValueGenerator = $randomValueGenerator;
        $this->participants = $participants;
    }

    public static function playersFactory(int $numberOfPlayers): array
    {
        $players = [];

        for ($playerNumber = 0; $playerNumber < $numberOfPlayers; ++$playerNumber) {
            $players[] = new Player($playerNumber + 1);
        }

        return $players;
    }

    public function initBoard()
    {
        $this->board = [];
        $this->output->writeLine(str_pad('', 65, '-'));
        for ($row = 0; $row < self::BOARDROW; $row++) {
            $rowPieces = [];
            for ($column = 0; $column < self::BOARDCOLUMN; $column++) {
                $this->board[$row][$column] = Token::createEmptySlot();
                $rowPieces[] = ' ' . str_pad((string)$this->board[$row][$column], 6, ' ');
            }
            $this->output->writeLine('|' . implode('|', $rowPieces) . '|');
            $this->output->writeLine(str_pad('', 65, '-'));
        }
    }

    public function run(): Output
    {
        $this->output->writeLine(sprintf(
                'Initialisation du jeu avec %d participants.',
                count($this->participants))
        );

        $this->output->writeLine('Initialisation de la grille en 6 colonnes et 7 lignes.');
        $this->initBoard();
        return $this->output;
    }
}