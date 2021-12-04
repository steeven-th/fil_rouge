<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pregnancy
 *
 * @ORM\Table(name="pregnancy", indexes={@ORM\Index(name="idParent", columns={"idParent"})})
 * @ORM\Entity(repositoryClass="App\Repository\PregnancyRepository")
 */
class Pregnancy {
    /**
     * @var int
     *
     * @ORM\Column(name="idPregnancy", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpregnancy;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateFertilization", type="date", nullable=true)
     */
    private $datefertilization;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateDelivery", type="date", nullable=true)
     */
    private $datedelivery;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="share", type="boolean", nullable=true)
     */
    private $share;

    /**
     * @var \Parents
     *
     * @ORM\ManyToOne(targetEntity="Parents")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idParent", referencedColumnName="idParent")
     * })
     */
    private $idparent;

    public function getIdpregnancy(): ?string {
        return $this->idpregnancy;
    }

    public function getDatefertilization(): ?\DateTimeInterface {
        return $this->datefertilization;
    }

    public function setDatefertilization(?\DateTimeInterface $datefertilization): self {
        $this->datefertilization = $datefertilization;

        return $this;
    }

    public function getDatedelivery(): ?\DateTimeInterface {
        return $this->datedelivery;
    }

    public function setDatedelivery(?\DateTimeInterface $datedelivery): self {
        $this->datedelivery = $datedelivery;

        return $this;
    }

    public function getShare(): ?bool {
        return $this->share;
    }

    public function setShare(?bool $share): self {
        $this->share = $share;

        return $this;
    }

    public function getIdparent(): ?Parents {
        return $this->idparent;
    }

    public function setIdparent(?Parents $idparent): self {
        $this->idparent = $idparent;

        return $this;
    }


}
