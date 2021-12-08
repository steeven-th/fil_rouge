<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Parents
 *
 * @ORM\Table(name="parents", indexes={@ORM\Index(name="idRole", columns={"idRole"})})
 * @ORM\Entity(repositoryClass="App\Repository\ParentsRepository")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class Parents implements UserInterface, PasswordAuthenticatedUserInterface {
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
     * @var string
     *
     * @ORM\Column(name="postalCode", type="string", nullable=true)
     */
    private $postalcode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="shareCode", type="string", length=64, nullable=true)
     */
    private $sharecode;

    /**
     * @var string The hashed password
     *
     * @ORM\Column(name="password", type="string", length=64, nullable=false)
     */
    private $password;

    /**
     * @var \Roles
     *
     * @ORM\ManyToOne(targetEntity="Roles", cascade={"persist"})
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
     * @ORM\Column(name="isActive", type="boolean")
     */
    private $isActive = false;

    /**
     * @var array
     *
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\Column(name="isVerified", type="boolean")
     */
    private $isVerified = false;

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

    public function getPostalcode(): ?string {
        return $this->postalcode;
    }

    public function setPostalcode(?string $postalcode): self {
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

    public function getUserIdentifier(): string {
        return $this->email;
    }

    public function getUsername(): string {
        return $this->getUserIdentifier();
    }

    /**
     * Returns the roles or permissions granted to the user for security.
     */
    public function getRoles(): array {
        $roles = $this->roles;

        // guarantees that a user always has at least one role for security
        if (empty($roles)) {
            $roles[] = 'ROLE_USER';
        }

        return array_unique($roles);
    }

    public function setRoles(array $roles): void {
        $this->roles = $roles;
    }

    /**
     * @see UserInterface
     */
    public function getSalt() {
        // not needed when using the "bcrypt" algorithm in security.yaml

        return null;
    }

    /**
     * Removes sensitive data from the user.
     *
     * {@inheritdoc}
     */
    public function eraseCredentials() {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function __serialize(): array {
        // add $this->salt too if you don't use Bcrypt or Argon2i
        return [$this->idparent, $this->email, $this->password];
    }

    public function __unserialize(array $data): void {
        // add $this->salt too if you don't use Bcrypt or Argon2i
        [$this->idparent, $this->email, $this->password] = $data;
    }

    public function __call(string $name, array $arguments) {
        // TODO: Implement @method string getUserIdentifier()
    }

    public function isActive(): bool {
        return $this->isVerified;
    }

    public function setIsActive(bool $isActive): self {
        $this->isActive = $isActive;

        return $this;
    }

    public function isVerified(): bool {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self {
        $this->isVerified = $isVerified;

        return $this;
    }
}
