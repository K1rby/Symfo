<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Motorisation
 *
 * @ORM\Table(name="motorisation")
 * @ORM\Entity
 */
class Motorisation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_moteur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMoteur;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=40, nullable=false)
     */
    private $nom;

    public function getIdMoteur(): ?int
    {
        return $this->idMoteur;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }


}
