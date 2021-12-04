<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typeimage
 *
 * @ORM\Table(name="typeImage")
 * @ORM\Entity(repositoryClass="App\Repository\TypeimageRepository")
 */
class Typeimage {
    /**
     * @var int
     *
     * @ORM\Column(name="idTypeImage", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtypeimage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="typeImage", type="string", length=50, nullable=true)
     */
    private $typeimage;

    public function getIdtypeimage(): ?string {
        return $this->idtypeimage;
    }

    public function getTypeimage(): ?string {
        return $this->typeimage;
    }

    public function setTypeimage(?string $typeimage): self {
        $this->typeimage = $typeimage;

        return $this;
    }


}
