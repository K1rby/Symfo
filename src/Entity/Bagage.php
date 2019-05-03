<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bagage
 *
 * @ORM\Table(name="bagage", indexes={@ORM\Index(name="checkinD", columns={"checkinD"}), @ORM\Index(name="checkinA", columns={"checkinA"})})
 * @ORM\Entity
 */
class Bagage
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_bagage", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBagage;

    /**
     * @var int
     *
     * @ORM\Column(name="poids", type="integer", nullable=false)
     */
    private $poids;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="checkinA", type="string", length=30, nullable=false)
     */
    private $checkina;

    /**
     * @var string
     *
     * @ORM\Column(name="checkinD", type="string", length=30, nullable=false)
     */
    private $checkind;

    public function getIdBagage(): ?int
    {
        return $this->idBagage;
    }

    public function getPoids(): ?int
    {
        return $this->poids;
    }

    public function setPoids(int $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getCheckina(): ?string
    {
        return $this->checkina;
    }

    public function setCheckina(string $checkina): self
    {
        $this->checkina = $checkina;

        return $this;
    }

    public function getCheckind(): ?string
    {
        return $this->checkind;
    }

    public function setCheckind(string $checkind): self
    {
        $this->checkind = $checkind;

        return $this;
    }


}
