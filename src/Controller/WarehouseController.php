<?php

namespace App\Controller;

use App\Model\GameSession;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonDecode;

class WarehouseController extends AbstractController
{
    #[Route('/warehouse', name: 'warehouse')]
    public function index(): Response
    {
        $client = new Client();//        $request = new Request('GET', 'https://game-the-warehouse.herokuapp.com/?' .
//            http_build_query(
//                [
//                "mode" => "start",
//                "name" => "A.",
//                "easymode" => true
//                ])
//                );
//        $response = $client->send($request);

//        $data = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

        $game = new GameSession("bdf2a598bd5f97bc88ed84e5371756e60ba5c8da", $client, 'https://game-the-warehouse.herokuapp.com/');

        return $this->render('warehouse/index.html.twig', [
            'controller_name' => 'WarehouseController',
        ]);
    }
}
