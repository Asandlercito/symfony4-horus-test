<?php

namespace App\Services;


use App\Entity\Triangle;
use App\Entity\Circle;
use Doctrine\ORM\EntityManagerInterface;

class CircleService
{

  private $pi = 3.1415;

  public function __construct( EntityManagerInterface $entityManagerInterface ) {    
    $this->entityManager = $entityManagerInterface;
  }
  
  public function createCircle($payload) : array {
    
    try {
      
      $circle = new Circle();

      $this->buildCircle($circle,$payload);

      $this->entityManager->persist($circle);
      $this->entityManager->flush();
    
      $response['success'] = true;
      $response['data']    = $circle->toArray();

    } catch (\Exception $e) {
      
      $response['message'] = $e->getMessage();
      $response['success']  = false;      
    }

    return $response;      
  }



  private function buildCircle(Circle $circle,Array $payload) : void {
   
    $radius    = $payload["radius"];
    $diameter  = $this->getCircleDiameter($radius);
    $perimeter = $this->getCirclePerimeter($diameter);
    $area      = $this->getCircleSurface($radius);

    $circle->setRadius($radius)
              ->setDiameter($diameter)              
              ->setDescripcion("this is nice circulo")
              ->setPerimeter($perimeter) 
              ->setSurface($area);
  }

  private function getCircleDiameter(Int $radius)  : int { 
    return $radius*2;        
  }

  private function getCirclePerimeter(Int $diameter) {     
    return $this->pi*$diameter;        
  }


  private function getCircleSurface(int $radius) {      
    return $this->pi*($radius*$radius);
  }


  public function getDiametersSum() : Array
  {
    /** - implemented method for sum of diameters for two or many given objects */
    $circles = $this->entityManager->getRepository(Circle::class)->findAll();

    if(empty($circles)) {        

        $response = [
            'success' => false,
            'msg' => "not circles found"
        ];

        return $response;
    }

    $sumDiameters  = 0;

    foreach ($circles as $key => $circle) {        
        $sumDiameters += $circle->getDiameter();
    }

    $response = [
        'success' => true,
        'sum_areas' => $sumAreas
    ];

    return $response;
  }



  
}
