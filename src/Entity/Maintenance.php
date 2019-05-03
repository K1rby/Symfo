<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Maintenance
 *
 * @ORM\Table(name="maintenance", indexes={@ORM\Index(name="id_avion", columns={"id_avion"})})
 * @ORM\Entity
 */
class Maintenance
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_maintenance", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMaintenance;

    /**
     * @var string
     *
     * @ORM\Column(name="suivi_appareil", type="string", length=30, nullable=false)
     */
    private $suiviAppareil;

    /**
     * @var string
     *
     * @ORM\Column(name="dateDebut", type="string", length=30, nullable=false)
     */
    private $datedebut;

    /**
     * @var string
     *
     * @ORM\Column(name="dateFin", type="string", length=40, nullable=false)
     */
    private $datefin;

    /**
     * @var \Avion
     *
     * @ORM\ManyToOne(targetEntity="Avion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_avion", referencedColumnName="id_avion")
     * })
     */
    private $idAvion;

    public function getIdMaintenance(): ?int
    {
        return $this->idMaintenance;
    }

    public function getSuiviAppareil(): ?string
    {
        return $this->suiviAppareil;
    }

    public function setSuiviAppareil(string $suiviAppareil): self
    {
        $this->suiviAppareil = $suiviAppareil;

        return $this;
    }

    public function getDatedebut(): ?string
    {
        return $this->datedebut;
    }

    public function setDatedebut(string $datedebut): self
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    public function getDatefin(): ?string
    {
        return $this->datefin;
    }

    public function setDatefin(string $datefin): self
    {
        $this->datefin = $datefin;

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


}
