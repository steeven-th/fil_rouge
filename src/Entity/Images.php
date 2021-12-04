<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Images
 *
 * @ORM\Table(name="images", indexes={@ORM\Index(name="idTypeImage", columns={"idTypeImage"}), @ORM\Index(name="idBaby", columns={"idBaby"})})
 * @ORM\Entity(repositoryClass="App\Repository\ImagesRepository")
 */
class Images {
    /**
     * @var int
     *
     * @ORM\Column(name="idImage", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idimage;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=500, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="comment", type="text", length=65535, nullable=true)
     */
    private $comment;

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

    /**
     * @var \Typeimage
     *
     * @ORM\ManyToOne(targetEntity="Typeimage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idTypeImage", referencedColumnName="idTypeImage")
     * })
     */
    private $idtypeimage;

    public function getIdimage(): ?string {
        return $this->idimage;
    }

    public function getUrl(): ?string {
        return $this->url;
    }

    public function setUrl(string $url): self {
        $this->url = $url;

        return $this;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function setName(string $name): self {
        $this->name = $name;

        return $this;
    }

    public function getComment(): ?string {
        return $this->comment;
    }

    public function setComment(?string $comment): self {
        $this->comment = $comment;

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

    public function getIdtypeimage(): ?Typeimage {
        return $this->idtypeimage;
    }

    public function setIdtypeimage(?Typeimage $idtypeimage): self {
        $this->idtypeimage = $idtypeimage;

        return $this;
    }


}
