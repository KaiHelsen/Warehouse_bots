<?php


namespace App\Model;


class Cel
{
    private Coordinate $coordinate;
    private string $ingredient;
    private bool $occupied;
    private bool $isEdge;

    public function __construct(int $x, int $y, string$ingredient,  bool $isEdge, bool $robot = false)
    {
        $this->coordinate = new Coordinate($x, $y);
        $this->ingredient = $ingredient;
        $this->isEdge = $isEdge;
        $this->occupied = $robot;
    }


    /**
     * @return Coordinate
     */
    public function getCoordinate(): Coordinate
    {
        return $this->coordinate;
    }

    /**
     * @param Coordinate $coordinate
     */
    public function setCoordinate(Coordinate $coordinate): void
    {
        $this->coordinate = $coordinate;
    }

    /**
     * @return string
     */
    public function getIngredient(): string
    {
        return $this->ingredient;
    }

    /**
     * @param string $ingredient
     */
    public function setIngredient(string $ingredient): void
    {
        $this->ingredient = $ingredient;
    }

    /**
     * @return bool
     */
    public function isOccupied(): bool
    {
        return $this->occupied;
    }

    /**
     * @param bool $occupied
     */
    public function setOccupied(bool $occupied): void
    {
        $this->occupied = $occupied;
    }
    /**
     * @return bool
     */
    public function isEdge(): bool
    {
        return $this->isEdge;
    }
}