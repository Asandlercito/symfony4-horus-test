<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Services\GeometryCalculatorService;
use App\Services\CircleService;


/**
 * @Route("/api")
 */

class CircleController extends AbstractController {

  /**
   * @Route("/circle/{radius}", name="create-circle",methodS="GET")
  */

  public function index(String $radius,CircleService $geometryCalculatorService) : Response
  {
    
    $payload  = [ 'radius' => $radius ];

    $response = $geometryCalculatorService->createCircle($payload);
                
    return New JsonResponse($response,Response::HTTP_OK);

  }
    
}
