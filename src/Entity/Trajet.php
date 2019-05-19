<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trajet
 *
 * @ORM\Table(name="trajet", indexes={@ORM\Index(name="trajet_ibfk_1", columns={"aeroportA"}), @ORM\Index(name="id_voyage", columns={"id_voyage"}), @ORM\Index(name="aeroportD", columns={"aeroportD"})})
 * @ORM\Entity
 */
class Trajet
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_trajet", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTrajet;

    /**
     * @var string
     *
     * @ORM\Column(name="duree", type="string", length=30, nullable=false)
     */
    private $duree;

    /**
     * @var int
     *
     * @ORM\Column(name="kilometre", type="integer", nullable=false)
     */
    private $kilometre;

    /**
     * @var \Aeroport
     *
     * @ORM\ManyToOne(targetEntity="Aeroport")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="aeroportA", referencedColumnName="code_aita")
     * })
     */
    private $aeroporta;

    /**
     * @var \Aeroport
     *
     * @ORM\ManyToOne(targetEntity="Aeroport")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="aeroportD", referencedColumnName="code_aita")
     * })
     */
    private $aeroportd;

    /**
     * @var \Voyage
     *
     * @ORM\ManyToOne(targetEntity="Voyage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_voyage", referencedColumnName="id_voyage")
     * })
     */
    private $idVoyage;

    public function getIdTrajet(): ?int
    {
        return $this->idTrajet;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getKilometre(): ?int
    {
        return $this->kilometre;
    }

    public function setKilometre(int $kilometre): self
    {
        $this->kilometre = $kilometre;

        return $this;
    }

    public function getAeroporta(): ?Aeroport
    {
        return $this->aeroporta;
    }

    public function setAeroporta(?Aeroport $aeroporta): self
    {
        $this->aeroporta = $aeroporta;

        return $this;
    }

    public function getAeroportd(): ?Aeroport
    {
        return $this->aeroportd;
    }

    public function setAeroportd(?Aeroport $aeroportd): self
    {
        $this->aeroportd = $aeroportd;

        return $this;
    }

    public function getIdVoyage(): ?Voyage
    {
        return $this->idVoyage;
    }

    public function setIdVoyage(?Voyage $idVoyage): self
    {
        $this->idVoyage = $idVoyage;

        return $this;
    }


}
