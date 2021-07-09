<?php


namespace App\Model;


class Robot
{
    private int $id;
    private coordinate $location;
    private array $ingredientsHeld;

    public function __construct(int $id, coordinate $location, array $ingredientsHeld)
    {
        $this->id = $id;
        $this->location = $location;
        $this->ingredientsHeld = $ingredientsHeld;
    }

    public static function FromArray(array $jsonData, int $id) : Robot
    {
        return new Robot($id, new coordinate($jsonData['x'], $jsonData['y']), $jsonData['ingredients']);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return coordinate
     */
    public function getLocation(): coordinate
    {
        return $this->location;
    }

    /**
     * @return array
     */
    public function getIngredientsHeld(): array
    {
        return $this->ingredientsHeld;
    }
}