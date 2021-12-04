<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Goodplan
 *
 * @ORM\Table(name="goodPlan")
 * @ORM\Entity(repositoryClass="App\Repository\GoodplanRepository")
 */
class Goodplan {
    /**
     * @var int
     *
     * @ORM\Column(name="idGoogPlan", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idgoogplan;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="content", type="text", length=65535, nullable=true)
     */
    private $content;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=200, nullable=true)
     */
    private $url;

    public function getIdgoogplan(): ?int {
        return $this->idgoogplan;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function setName(?string $name): self {
        $this->name = $name;

        return $this;
    }

    public function getContent(): ?string {
        return $this->content;
    }

    public function setContent(?string $content): self {
        $this->content = $content;

        return $this;
    }

    public function getUrl(): ?string {
        return $this->url;
    }

    public function setUrl(?string $url): self {
        $this->url = $url;

        return $this;
    }


}
