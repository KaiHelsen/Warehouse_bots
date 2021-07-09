<?php


namespace App\Model;


class Order
{

    private int $score;
    private bool $isCompleted;
    /**
     * @var OrderItem[]
     */
    private array $orders;

    public function __construct(int $score, string $product, array $orders)
    {
        $this->product = $product;
        $this->score = $score;
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
    public function getProduct(): string
    {
        return $this->product;
    }

    public static function fromArray(array $decodedJson) : Order
    {
        $score = $decodedJson['score'];
        $isCompleted = (bool)$decodedJson['isCompleted'];

        $orders = [];
        foreach($decodedJson["ingredients"] as $ingredient)
        {
            $orders[] = new OrderItem($ingredient['score'], $ingredient['name']);
        }

        return new Order($score, $isCompleted, $orders);
    }

}