<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Calendaritems
 *
 * @ORM\Table(name="calendarItems")
 * @ORM\Entity(repositoryClass="App\Repository\CalendaritemsRepository")
 */
class Calendaritems {
    /**
     * @var int
     *
     * @ORM\Column(name="idCalendarItem", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcalendaritem;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nameItem", type="string", length=50, nullable=true)
     */
    private $nameitem;

    public function getIdcalendaritem(): ?int {
        return $this->idcalendaritem;
    }

    public function getNameitem(): ?string {
        return $this->nameitem;
    }

    public function setNameitem(?string $nameitem): self {
        $this->nameitem = $nameitem;

        return $this;
    }


}
