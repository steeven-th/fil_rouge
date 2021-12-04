<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Roles
 *
 * @ORM\Table(name="roles")
 * @ORM\Entity(repositoryClass="App\Repository\RolesRepository")
 */
class Roles {
    /**
     * @var int
     *
     * @ORM\Column(name="idRole", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idrole;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=50, nullable=false)
     */
    private $role;

    public function getIdrole(): ?string {
        return $this->idrole;
    }

    public function getRole(): ?string {
        return $this->role;
    }

    public function setRole(string $role): self {
        $this->role = $role;

        return $this;
    }


}
