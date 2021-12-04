<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Checklistitems
 *
 * @ORM\Table(name="checkListItems")
 * @ORM\Entity(repositoryClass="App\Repository\ChecklistitemsRepository")
 */
class Checklistitems {
    /**
     * @var int
     *
     * @ORM\Column(name="idCheckListItems", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idchecklistitems;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nameItem", type="string", length=50, nullable=true)
     */
    private $nameitem;

    public function getIdchecklistitems(): ?int {
        return $this->idchecklistitems;
    }

    public function getNameitem(): ?string {
        return $this->nameitem;
    }

    public function setNameitem(?string $nameitem): self {
        $this->nameitem = $nameitem;

        return $this;
    }


}
