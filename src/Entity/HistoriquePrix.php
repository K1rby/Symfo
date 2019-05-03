<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HistoriquePrix
 *
 * @ORM\Table(name="historique_prix", indexes={@ORM\Index(name="id_voyage", columns={"id_voyage"}), @ORM\Index(name="id_prix", columns={"id_prix"})})
 * @ORM\Entity
 */
class HistoriquePrix
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_historiqueprix", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idHistoriqueprix;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var \Prix
     *
     * @ORM\ManyToOne(targetEntity="Prix")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_prix", referencedColumnName="id_prix")
     * })
     */
    private $idPrix;

    /**
     * @var \Voyage
     *
     * @ORM\ManyToOne(targetEntity="Voyage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_voyage", referencedColumnName="id_voyage")
     * })
     */
    private $idVoyage;

    public function getIdHistoriqueprix(): ?int
    {
        return $this->idHistoriqueprix;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getIdPrix(): ?Prix
    {
        return $this->idPrix;
    }

    public function setIdPrix(?Prix $idPrix): self
    {
        $this->idPrix = $idPrix;

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
