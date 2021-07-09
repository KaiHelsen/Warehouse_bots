<?php

namespace App\Controller;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WarehouseController extends AbstractController
{
    #[Route('/warehouse', name: 'warehouse')]
    public function index(): Response
    {
        $client = new Client();
        $request = new Request('GET', 'https://game-the-warehouse.herokuapp.com/?' .
            http_build_query(
                [
                "mode" => "start",
                "name" => "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA",
                "easymode" => true
                ])
                );
        $response = $client->send($request);

        var_dump($response->getBody()->getContents());
        return $this->render('warehouse/index.html.twig', [
            'controller_name' => 'WarehouseController',
        ]);
    }
}
