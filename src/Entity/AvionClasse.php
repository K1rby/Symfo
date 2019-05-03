<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AvionClasse
 *
 * @ORM\Table(name="avion_classe", indexes={@ORM\Index(name="id_classe", columns={"id_classe"}), @ORM\Index(name="id_avion", columns={"id_avion"})})
 * @ORM\Entity
 */
class AvionClasse
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_avionclasse", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAvionclasse;

    /**
     * @var int
     *
     * @ORM\Column(name="place_dispo", type="integer", nullable=false)
     */
    private $placeDispo;

    /**
     * @var int
     *
     * @ORM\Column(name="place_prise", type="integer", nullable=false)
     */
    private $placePrise;

    /**
     * @var \Avion
     *
     * @ORM\ManyToOne(targetEntity="Avion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_avion", referencedColumnName="id_avion")
     * })
     */
    private $idAvion;

    /**
     * @var \Classe
     *
     * @ORM\ManyToOne(targetEntity="Classe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_classe", referencedColumnName="id_classe")
     * })
     */
    private $idClasse;

    public function getIdAvionclasse(): ?int
    {
        return $this->idAvionclasse;
    }

    public function getPlaceDispo(): ?int
    {
        return $this->placeDispo;
    }

    public function setPlaceDispo(int $placeDispo): self
    {
        $this->placeDispo = $placeDispo;

        return $this;
    }

    public function getPlacePrise(): ?int
    {
        return $this->placePrise;
    }

    public function setPlacePrise(int $placePrise): self
    {
        $this->placePrise = $placePrise;

        return $this;
    }

    public function getIdAvion(): ?Avion
    {
        return $this->idAvion;
    }

    public function setIdAvion(?Avion $idAvion): self
    {
        $this->idAvion = $idAvion;

        return $this;
    }

    public function getIdClasse(): ?Classe
    {
        return $this->idClasse;
    }

    public function setIdClasse(?Classe $idClasse): self
    {
        $this->idClasse = $idClasse;

        return $this;
    }


}
