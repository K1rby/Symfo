<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Incident
 *
 * @ORM\Table(name="incident", indexes={@ORM\Index(name="id_personnel", columns={"id_personnel"})})
 * @ORM\Entity
 */
class Incident
{
    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=30, nullable=false)
     */
    private $lieu;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="text", length=65535, nullable=false)
     */
    private $commentaire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_incident", type="date", nullable=false)
     */
    private $dateIncident;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_avion", type="integer", nullable=true)
     */
    private $idAvion;

    /**
     * @var \Avion
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Avion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_incident", referencedColumnName="id_avion")
     * })
     */
    private $idIncident;

    /**
     * @var \Personnel
     *
     * @ORM\ManyToOne(targetEntity="Personnel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_personnel", referencedColumnName="id_personnel")
     * })
     */
    private $idPersonnel;

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getDateIncident(): ?\DateTimeInterface
    {
        return $this->dateIncident;
    }

    public function setDateIncident(\DateTimeInterface $dateIncident): self
    {
        $this->dateIncident = $dateIncident;

        return $this;
    }

    public function getIdAvion(): ?int
    {
        return $this->idAvion;
    }

    public function setIdAvion(?int $idAvion): self
    {
        $this->idAvion = $idAvion;

        return $this;
    }

    public function getIdIncident(): ?Avion
    {
        return $this->idIncident;
    }

    public function setIdIncident(?Avion $idIncident): self
    {
        $this->idIncident = $idIncident;

        return $this;
    }

    public function getIdPersonnel(): ?Personnel
    {
        return $this->idPersonnel;
    }

    public function setIdPersonnel(?Personnel $idPersonnel): self
    {
        $this->idPersonnel = $idPersonnel;

        return $this;
    }


}
