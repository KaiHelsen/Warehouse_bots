<?php


namespace App\Model;


class OrderItem
{
    private int $score;
    private string $ingredient;

    public function __construct(int $score, string $ingredient)
    {
        $this->score = $score;
        $this->ingredient = $ingredient;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * @return string
     */
    public function getIngredient(): string
    {
        return $this->ingredient;
    }


}