<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="circles")
 */
class Circle
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
    protected $diameter;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $perimeter;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $radius;  
   
    public function toArray()
    {
        return [
            'descripcion' => $this->getDescripcion(),
            'radius' => $this->getRadius(),
            'diameter' => $this->getDiameter(),           
            'area_surface' => $this->getSurface(),
            'perimeter_cirfumference' => $this->getPerimeter()
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

    public function getRadius(): ?string
    {
        return $this->radius;
    }

    public function setRadius(?string $radius): self
    {
        $this->radius = $radius;

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

    public function getDiameter(): ?string
    {
        return $this->diameter;
    }

    public function setDiameter(?string $diameter): self
    {
        $this->diameter = $diameter;

        return $this;
    }

}
