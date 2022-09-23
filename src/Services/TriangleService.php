<?php

namespace App\Services;


use App\Entity\Triangle;
use App\Entity\Circle;
use Doctrine\ORM\EntityManagerInterface;

class TriangleService
{

  public function __construct( EntityManagerInterface $entityManagerInterface ) {    
    $this->entityManager = $entityManagerInterface;
  }
  
  public function createTriangle($payload) : array {
    
    try {
      
      $triangle = new Triangle();

      $this->buildTriangle($triangle,$payload);

      $this->entityManager->persist($triangle);
      $this->entityManager->flush();
    
      $response['success'] = true;
      $response['data']    = $triangle->toArray();

    } catch (\Exception $e) {
      
      $response['message'] = $e->getMessage();
      $response['success']  = false;      
    }

    return $response;      
  }

  private function buildTriangle(Triangle $triangle,Array $payload) : void {
   
    $triangle->setLadoA($payload["lado_a"])
              ->setLadoB($payload["lado_b"])
              ->setLadoC($payload["lado_c"])
              ->setDescripcion("this is nice triangle")
              ->setPerimeter($this->getTrianglePerimeter($payload))
              ->setSurface($this->getTriangleSurface($payload));
  }


  private function getTriangleSurface(Array $payload) {

    /** Fórmula de Herón */

    $sideSum  = (int)$payload["lado_a"]+(int)$payload["lado_b"]+(int)$payload["lado_c"];

    $semiperimetro = $sideSum/2;

    $a = $semiperimetro*($semiperimetro-$payload["lado_a"])*($semiperimetro-$payload["lado_b"])*($semiperimetro-$payload["lado_c"]);

    $area = sqrt($a);
    
    return $area;
  }

  private function getTrianglePerimeter(Array $payload)  : int { 
    return (int)$payload["lado_a"]+(int)$payload["lado_b"]+(int)$payload["lado_b"];        
  }

  public function sumAreas(Array $triangulos) {
    foreach ($triangulos as $key => $triangulo) {
        # code...
    }
  }


  public function getAreasSum() : Array
  {
    /** - implemented method for sum of areas for two or many given objects */
    $triangles = $this->entityManager->getRepository(Triangle::class)->findAll();

    if(empty($triangles)) {        

        $response = [
            'success' => false,
            'msg' => "not areas found"
        ];

        return $response;
    }

    $sumAreas  = 0;

    foreach ($triangles as $key => $triangle) {        
        $sumAreas += $triangle->getSurface();
    }

    $response = [
        'success' => true,
        'sum_areas' => $sumAreas
    ];

    return $response;
  }

}
