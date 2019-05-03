<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Avion
 *
 * @ORM\Table(name="avion", indexes={@ORM\Index(name="id_modele", columns={"id_modele"}), @ORM\Index(name="avion_aeroport", columns={"id_aeroport"}), @ORM\Index(name="id_moteur", columns={"id_moteur"})})
 * @ORM\Entity
 */
class Avion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_avion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAvion;

    /**
     * @var int|null
     *
     * @ORM\Column(name="distanceP", type="integer", nullable=true)
     */
    private $distancep;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="status", type="boolean", nullable=true)
     */
    private $status;

    /**
     * @var \Aeroport
     *
     * @ORM\ManyToOne(targetEntity="Aeroport")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_aeroport", referencedColumnName="code_aita")
     * })
     */
    private $idAeroport;

    /**
     * @var \Motorisation
     *
     * @ORM\ManyToOne(targetEntity="Motorisation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_moteur", referencedColumnName="id_moteur")
     * })
     */
    private $idMoteur;

    /**
     * @var \Modele
     *
     * @ORM\ManyToOne(targetEntity="Modele")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_modele", referencedColumnName="id_modele")
     * })
     */
    private $idModele;

    public function getIdAvion(): ?int
    {
        return $this->idAvion;
    }

    public function getDistancep(): ?int
    {
        return $this->distancep;
    }

    public function setDistancep(?int $distancep): self
    {
        $this->distancep = $distancep;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(?bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getIdAeroport(): ?Aeroport
    {
        return $this->idAeroport;
    }

    public function setIdAeroport(?Aeroport $idAeroport): self
    {
        $this->idAeroport = $idAeroport;

        return $this;
    }

    public function getIdMoteur(): ?Motorisation
    {
        return $this->idMoteur;
    }

    public function setIdMoteur(?Motorisation $idMoteur): self
    {
        $this->idMoteur = $idMoteur;

        return $this;
    }

    public function getIdModele(): ?Modele
    {
        return $this->idModele;
    }

    public function setIdModele(?Modele $idModele): self
    {
        $this->idModele = $idModele;

        return $this;
    }


}
