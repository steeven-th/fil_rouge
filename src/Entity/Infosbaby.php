<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Infosbaby
 *
 * @ORM\Table(name="infosBaby", indexes={@ORM\Index(name="idBaby", columns={"idBaby"})})
 * @ORM\Entity(repositoryClass="App\Repository\InfosbabyRepository")
 */
class Infosbaby {
    /**
     * @var int
     *
     * @ORM\Column(name="idInfoBaby", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idinfobaby;

    /**
     * @var int|null
     *
     * @ORM\Column(name="size", type="integer", nullable=true)
     */
    private $size;

    /**
     * @var string|null
     *
     * @ORM\Column(name="weight", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $weight;

    /**
     * @var int|null
     *
     * @ORM\Column(name="age", type="integer", nullable=true)
     */
    private $age;

    /**
     * @var int|null
     *
     * @ORM\Column(name="weekPregnancy", type="integer", nullable=true)
     */
    private $weekpregnancy;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="share", type="boolean", nullable=true)
     */
    private $share;

    /**
     * @var \Baby
     *
     * @ORM\ManyToOne(targetEntity="Baby")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idBaby", referencedColumnName="idBaby")
     * })
     */
    private $idbaby;

    public function getIdinfobaby(): ?string {
        return $this->idinfobaby;
    }

    public function getSize(): ?int {
        return $this->size;
    }

    public function setSize(?int $size): self {
        $this->size = $size;

        return $this;
    }

    public function getWeight(): ?string {
        return $this->weight;
    }

    public function setWeight(?string $weight): self {
        $this->weight = $weight;

        return $this;
    }

    public function getAge(): ?int {
        return $this->age;
    }

    public function setAge(?int $age): self {
        $this->age = $age;

        return $this;
    }

    public function getWeekpregnancy(): ?int {
        return $this->weekpregnancy;
    }

    public function setWeekpregnancy(?int $weekpregnancy): self {
        $this->weekpregnancy = $weekpregnancy;

        return $this;
    }

    public function getShare(): ?bool {
        return $this->share;
    }

    public function setShare(?bool $share): self {
        $this->share = $share;

        return $this;
    }

    public function getIdbaby(): ?Baby {
        return $this->idbaby;
    }

    public function setIdbaby(?Baby $idbaby): self {
        $this->idbaby = $idbaby;

        return $this;
    }


}
