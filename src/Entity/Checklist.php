<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Checklist
 *
 * @ORM\Table(name="checkList", indexes={@ORM\Index(name="idCheckListItems", columns={"idCheckListItems"}), @ORM\Index(name="idCheckListName", columns={"idCheckListName"})})
 * @ORM\Entity(repositoryClass="App\Repository\ChecklistRepository")
 */
class Checklist {
    /**
     * @var int
     *
     * @ORM\Column(name="idCheckList", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idchecklist;

    /**
     * @var \Checklistname
     *
     * @ORM\ManyToOne(targetEntity="Checklistname")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCheckListName", referencedColumnName="idCheckListName")
     * })
     */
    private $idchecklistname;

    /**
     * @var \Checklistitems
     *
     * @ORM\ManyToOne(targetEntity="Checklistitems")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCheckListItems", referencedColumnName="idCheckListItems")
     * })
     */
    private $idchecklistitems;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Parents", mappedBy="idchecklist")
     */
    private $idparent;

    /**
     * Constructor
     */
    public function __construct() {
        $this->idparent = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdchecklist(): ?string {
        return $this->idchecklist;
    }

    public function getIdchecklistname(): ?Checklistname {
        return $this->idchecklistname;
    }

    public function setIdchecklistname(?Checklistname $idchecklistname): self {
        $this->idchecklistname = $idchecklistname;

        return $this;
    }

    public function getIdchecklistitems(): ?Checklistitems {
        return $this->idchecklistitems;
    }

    public function setIdchecklistitems(?Checklistitems $idchecklistitems): self {
        $this->idchecklistitems = $idchecklistitems;

        return $this;
    }

    /**
     * @return Collection|Parents[]
     */
    public function getIdparent(): Collection {
        return $this->idparent;
    }

    public function addIdparent(Parents $idparent): self {
        if (!$this->idparent->contains($idparent)) {
            $this->idparent[] = $idparent;
            $idparent->addIdchecklist($this);
        }

        return $this;
    }

    public function removeIdparent(Parents $idparent): self {
        if ($this->idparent->removeElement($idparent)) {
            $idparent->removeIdchecklist($this);
        }

        return $this;
    }

}
