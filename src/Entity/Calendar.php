<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Calendar
 *
 * @ORM\Table(name="calendar", indexes={@ORM\Index(name="idCalendarList", columns={"idCalendarList"}), @ORM\Index(name="idCalendarItem", columns={"idCalendarItem"})})
 * @ORM\Entity(repositoryClass="App\Repository\CalendarRepository")
 */
class Calendar {
    /**
     * @var int
     *
     * @ORM\Column(name="idCalendar", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcalendar;

    /**
     * @var \Calendaritems
     *
     * @ORM\ManyToOne(targetEntity="Calendaritems")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCalendarItem", referencedColumnName="idCalendarItem")
     * })
     */
    private $idcalendaritem;

    /**
     * @var \Calendarlist
     *
     * @ORM\ManyToOne(targetEntity="Calendarlist")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCalendarList", referencedColumnName="idCalendarList")
     * })
     */
    private $idcalendarlist;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Parents", mappedBy="idcalendar")
     */
    private $idparent;

    /**
     * Constructor
     */
    public function __construct() {
        $this->idparent = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdcalendar(): ?string {
        return $this->idcalendar;
    }

    public function getIdcalendaritem(): ?Calendaritems {
        return $this->idcalendaritem;
    }

    public function setIdcalendaritem(?Calendaritems $idcalendaritem): self {
        $this->idcalendaritem = $idcalendaritem;

        return $this;
    }

    public function getIdcalendarlist(): ?Calendarlist {
        return $this->idcalendarlist;
    }

    public function setIdcalendarlist(?Calendarlist $idcalendarlist): self {
        $this->idcalendarlist = $idcalendarlist;

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
            $idparent->addIdcalendar($this);
        }

        return $this;
    }

    public function removeIdparent(Parents $idparent): self {
        if ($this->idparent->removeElement($idparent)) {
            $idparent->removeIdcalendar($this);
        }

        return $this;
    }

}
