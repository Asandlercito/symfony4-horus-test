<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="triangles")
 */

class Triangle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */ 
    protected $descripcion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */ 
    protected $perimeter;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */ 
    protected $surface;  

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */ 
    protected $ladoA;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */ 
    protected $ladoB;   
        
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */ 
    protected $ladoC;

    public function toArray()
    {
        return [
            'descripcion' => $this->getDescripcion(),
            'lado_a' => $this->getLadoA(),
            'lado_b' => $this->getLadoB(),
            'lado_c' => $this->getLadoC(),
            'area_surface' => $this->getSurface(),
            'perimeter' => $this->getPerimeter()
        ];
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getPerimeter(): ?string
    {
        return $this->perimeter;
    }

    public function setPerimeter(?string $perimeter): self
    {
        $this->perimeter = $perimeter;

        return $this;
    }

    public function getSurface(): ?string
    {
        return $this->surface;
    }

    public function setSurface(?string $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getLadoA(): ?string
    {
        return $this->ladoA;
    }

    public function setLadoA(?string $ladoA): self
    {
        $this->ladoA = $ladoA;

        return $this;
    }

    public function getLadoB(): ?string
    {
        return $this->ladoB;
    }

    public function setLadoB(?string $ladoB): self
    {
        $this->ladoB = $ladoB;

        return $this;
    }


    public function getLadoC(): ?string
    {
        return $this->ladoC;
    }

    public function setLadoC(?string $ladoC): self
    {
        $this->ladoC = $ladoC;

        return $this;
    }

    
    
}
