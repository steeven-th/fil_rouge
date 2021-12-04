<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Parents
 *
 * @ORM\Table(name="parents", indexes={@ORM\Index(name="idRole", columns={"idRole"})})
 * @ORM\Entity(repositoryClass="App\Repository\ParentsRepository")
 */
class Parents {
    /**
     * @var int
     *
     * @ORM\Column(name="idParent", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idparent;

    /**
     * @var string|null
     *
     * @ORM\Column(name="parent1Name", type="string", length=50, nullable=true)
     */
    private $parent1name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="parent2Name", type="string", length=50, nullable=true)
     */
    private $parent2name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tel", type="string", length=50, nullable=true)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     */
    private $email;

    /**
     * @var int|null
     *
     * @ORM\Column(name="postalCode", type="integer", nullable=true)
     */
    private $postalcode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="shareCode", type="string", length=64, nullable=true)
     */
    private $sharecode;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=64, nullable=false)
     */
    private $password;

    /**
     * @var \Roles
     *
     * @ORM\ManyToOne(targetEntity="Roles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idRole", referencedColumnName="idRole")
     * })
     */
    private $idrole;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Checklist", inversedBy="idparent")
     * @ORM\JoinTable(name="answer",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idParent", referencedColumnName="idParent")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idCheckList", referencedColumnName="idCheckList")
     *   }
     * )
     */
    private $idchecklist;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Calendar", inversedBy="idparent")
     * @ORM\JoinTable(name="rdv",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idParent", referencedColumnName="idParent")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idCalendar", referencedColumnName="idCalendar")
     *   }
     * )
     */
    private $idcalendar;

    /**
     * Constructor
     */
    public function __construct() {
        $this->idchecklist = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idcalendar = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdparent(): ?string {
        return $this->idparent;
    }

    public function getParent1name(): ?string {
        return $this->parent1name;
    }

    public function setParent1name(?string $parent1name): self {
        $this->parent1name = $parent1name;

        return $this;
    }

    public function getParent2name(): ?string {
        return $this->parent2name;
    }

    public function setParent2name(?string $parent2name): self {
        $this->parent2name = $parent2name;

        return $this;
    }

    public function getTel(): ?string {
        return $this->tel;
    }

    public function setTel(?string $tel): self {
        $this->tel = $tel;

        return $this;
    }

    public function getEmail(): ?string {
        return $this->email;
    }

    public function setEmail(string $email): self {
        $this->email = $email;

        return $this;
    }

    public function getPostalcode(): ?int {
        return $this->postalcode;
    }

    public function setPostalcode(?int $postalcode): self {
        $this->postalcode = $postalcode;

        return $this;
    }

    public function getSharecode(): ?string {
        return $this->sharecode;
    }

    public function setSharecode(?string $sharecode): self {
        $this->sharecode = $sharecode;

        return $this;
    }

    public function getPassword(): ?string {
        return $this->password;
    }

    public function setPassword(string $password): self {
        $this->password = $password;

        return $this;
    }

    public function getIdrole(): ?Roles {
        return $this->idrole;
    }

    public function setIdrole(?Roles $idrole): self {
        $this->idrole = $idrole;

        return $this;
    }

    /**
     * @return Collection|Checklist[]
     */
    public function getIdchecklist(): Collection {
        return $this->idchecklist;
    }

    public function addIdchecklist(Checklist $idchecklist): self {
        if (!$this->idchecklist->contains($idchecklist)) {
            $this->idchecklist[] = $idchecklist;
        }

        return $this;
    }

    public function removeIdchecklist(Checklist $idchecklist): self {
        $this->idchecklist->removeElement($idchecklist);

        return $this;
    }

    /**
     * @return Collection|Calendar[]
     */
    public function getIdcalendar(): Collection {
        return $this->idcalendar;
    }

    public function addIdcalendar(Calendar $idcalendar): self {
        if (!$this->idcalendar->contains($idcalendar)) {
            $this->idcalendar[] = $idcalendar;
        }

        return $this;
    }

    public function removeIdcalendar(Calendar $idcalendar): self {
        $this->idcalendar->removeElement($idcalendar);

        return $this;
    }

}
