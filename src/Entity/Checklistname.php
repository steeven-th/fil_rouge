<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Checklistname
 *
 * @ORM\Table(name="checkListName")
 * @ORM\Entity(repositoryClass="App\Repository\ChecklistnameRepository")
 */
class Checklistname {
    /**
     * @var int
     *
     * @ORM\Column(name="idCheckListName", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idchecklistname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nameCheckList", type="string", length=50, nullable=true)
     */
    private $namechecklist;

    public function getIdchecklistname(): ?int {
        return $this->idchecklistname;
    }

    public function getNamechecklist(): ?string {
        return $this->namechecklist;
    }

    public function setNamechecklist(?string $namechecklist): self {
        $this->namechecklist = $namechecklist;

        return $this;
    }


}
