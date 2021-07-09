<?php


namespace App\Model;


class Cell
{
    private coordinate $coordinate;
    private string $ingredient;
    private bool $occupied;
    private bool $isEdge;

    public function __construct(int $x, int $y, string $ingredient,  bool $isEdge, bool $robot = false)
    {
        $this->coordinate = new Coordinate($x, $y);
        $this->ingredient = $ingredient;
        $this->isEdge = $isEdge;
        $this->occupied = $robot;
    }

    public static function fromArray(array $decodedJson): Cell
    {
        if($decodedJson['ingredient'] === null)
        {
            return new Cell($decodedJson['x'], $decodedJson['y'], "", (bool)$decodedJson['robot']);
        }

        $isEdge = ($decodedJson['x'] == 0   || $decodedJson['y'] == 0|| $decodedJson['x'] == 30|| $decodedJson['y'] == 30);
        return new Cell($decodedJson['x'], $decodedJson['y'], $decodedJson['ingredient']['name'], $isEdge, (bool)$decodedJson['robot']);
    }


    /**
     * @return coordinate
     */
    public function getCoordinate(): coordinate
    {
        return $this->coordinate;
    }

    /**
     * @param coordinate $coordinate
     */
    public function setCoordinate(coordinate $coordinate): void
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