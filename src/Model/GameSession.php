<?php


namespace App\Model;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use Symfony\Component\Serializer\Encoder\JsonDecode;

class GameSession
{
    private string $accessKey;
    private Client $client;
    private string $source;

    private array $orders;
    private array $robots;
    private Warehouse $warehouse;

    public function __construct(string $key, Client $client, string $source)
    {
        $this->accessKey = $key;
        $this->client = $client;
        $this->source = $source;

        $this->orders = $this->fetchOrders();
        $this->warehouse = $this->fetchWarehouse();
        $this->robots = $this->fetchRobots();

//        var_dump($this->warehouse);
    }

    /**
     * @return Order[]
     * @throws GuzzleException
     * @throws \JsonException
     */
    private function fetchOrders(): array
    {
        //?mode=orders&key=example

        $response = $this->doAPICall([
            "mode" => "orders",
            "key" => $this->accessKey,
        ]);
        $orders = [];
        foreach ($response as $order)
        {
            $orders[] = Order::fromArray($order);
        }

        return $orders;
    }

    /**
     * @return Cell[]
     * @throws GuzzleException
     * @throws \JsonException
     */
    private function fetchWarehouse(): Warehouse
    {
        $response = $this->doAPICall([
            "mode" => "grid",
            "key" => $this->accessKey,
        ]);
        return Warehouse::fromArray($response);
        //?mode=grid&key=example

    }

    /**
     * @throws GuzzleException
     * @throws \JsonException
     */
    private function doAPICall(array $commands): array
    {
        $request = new Request('GET', $this->source . '?' .
            http_build_query($commands));
        $response = $this->client->send($request);

        return json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
    }

    private function fetchRobots() : array
    {
        $response = $this->doAPICall([
            "mode => robots",
            "key" => $this->accessKey,
        ]);
//        var_dump($response->getBody()->getContents());
        $robots = [];
        foreach($response as $i => $data)
        {
            $robots[] = Robot::fromArray($data, $i);
        }

        return $robots;
//        [
//    {
//        "ingredients": ["salad"],
//        "cell": {
//            "x": 1,
//            "y": 1
//        }
//    }
//]
    }
}