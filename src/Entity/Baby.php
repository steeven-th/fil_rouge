<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Baby
 *
 * @ORM\Table(name="baby", indexes={@ORM\Index(name="idParent", columns={"idParent"})})
 * @ORM\Entity(repositoryClass="App\Repository\BabyRepository")
 */
class Baby {
    /**
     * @var int
     *
     * @ORM\Column(name="idBaby", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idbaby;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="sexe", type="boolean", nullable=true)
     */
    private $sexe;

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

    public function getIdbaby(): ?string {
        return $this->idbaby;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function setName(?string $name): self {
        $this->name = $name;

        return $this;
    }

    public function getSexe(): ?bool {
        return $this->sexe;
    }

    public function setSexe(?bool $sexe): self {
        $this->sexe = $sexe;

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
