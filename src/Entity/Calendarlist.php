<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Calendarlist
 *
 * @ORM\Table(name="calendarList")
 * @ORM\Entity(repositoryClass="App\Repository\CalendarlistRepository")
 */
class Calendarlist {
    /**
     * @var int
     *
     * @ORM\Column(name="idCalendarList", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcalendarlist;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nameCalendar", type="string", length=50, nullable=true)
     */
    private $namecalendar;

    public function getIdcalendarlist(): ?int {
        return $this->idcalendarlist;
    }

    public function getNamecalendar(): ?string {
        return $this->namecalendar;
    }

    public function setNamecalendar(?string $namecalendar): self {
        $this->namecalendar = $namecalendar;

        return $this;
    }


}
