<?php

namespace App\Services;


use App\Entity\Triangle;
use App\Entity\Circle;
use Doctrine\ORM\EntityManagerInterface;

class GeometryCalculatorService
{

  private $pi = 3.1415;
  
  public function createTriangle($payload) : array {
    
    try {
      
      $triangle = new Triangle();

      $this->buildTriangle($triangle,$payload);
    
      $response['success'] = true;
      $response['data']    = $triangle->toArray();

    } catch (\Exception $e) {
      
      $response['message'] = $e->getMessage();
      $response['success']  = false;      
    }

    return $response;      
  }

  public function createCircle($payload) : array {
    
    try {
      
      $circle = new Circle();

      $this->buildCircle($circle,$payload);
    
      $response['success'] = true;
      $response['data']    = $circle->toArray();

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


  private function getCircleDiameter(Int $radius)  : int { 
    return $radius*2;        
  }

  private function getCirclePerimeter(Int $diameter) {     
    return $this->pi*$diameter;        
  }


  private function getCircleSurface(int $radius) {      
    return $this->pi*($radius*$radius);
  }



  
}
