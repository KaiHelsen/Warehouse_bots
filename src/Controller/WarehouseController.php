<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WarehouseController extends AbstractController
{
    #[Route('/warehouse', name: 'warehouse')]
    public function index(): Response
    {
        return $this->render('warehouse/index.html.twig', [
            'controller_name' => 'WarehouseController',
        ]);
    }
}
