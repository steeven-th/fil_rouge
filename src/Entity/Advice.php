<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Advice
 *
 * @ORM\Table(name="advice")
 * @ORM\Entity(repositoryClass="App\Repository\AdviceRepository")
 */
class Advice {
    /**
     * @var int
     *
     * @ORM\Column(name="idAdvice", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idadvice;

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

    public function getIdadvice(): ?int {
        return $this->idadvice;
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


}
