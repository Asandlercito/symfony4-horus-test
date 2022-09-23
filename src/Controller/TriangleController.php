<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Services\TriangleService;

/**
 * @Route("/api")
 */

class TriangleController extends AbstractController {


  /**
   * @Route("/triangle/{a}/{b}/{c}", name="create-triangle",methodS="GET")
  */

  public function index(String $a,String $b,String $c,TriangleService $geometryCalculatorService) : Response
  {
    
    $payload  = [
      "lado_a" => $a ,"lado_b" => $b,"lado_c" => $c
    ];

    $response = $geometryCalculatorService->createTriangle($payload);
                
    return New JsonResponse($response,Response::HTTP_CREATED);

  }

  /**
   * @Route("/triangle/sumareas", name="create-triangle",methodS="GET")
  */

  public function sumTrianglesAreas(TriangleService $geometryCalculatorService) : Response
  {
    /** - implement method for sum of areas for two given objects */
    $response = $geometryCalculatorService->getAreasSum();
                
    return New JsonResponse($response,Response::HTTP_OK);

  }
   
}
