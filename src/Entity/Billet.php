<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Billet
 *
 * @ORM\Table(name="billet", indexes={@ORM\Index(name="id_voyage", columns={"id_voyage"}), @ORM\Index(name="id_tarif", columns={"id_tarif"}), @ORM\Index(name="id_classe", columns={"id_classe"}), @ORM\Index(name="id_passager", columns={"id_passager"}), @ORM\Index(name="id_prix", columns={"id_prix"})})
 * @ORM\Entity
 */
class Billet
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_billet", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBillet;

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
     * @var \Tarif
     *
     * @ORM\ManyToOne(targetEntity="Tarif")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tarif", referencedColumnName="id_tarif")
     * })
     */
    private $idTarif;

    /**
     * @var \Classe
     *
     * @ORM\ManyToOne(targetEntity="Classe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_classe", referencedColumnName="id_classe")
     * })
     */
    private $idClasse;

    /**
     * @var \Voyage
     *
     * @ORM\ManyToOne(targetEntity="Voyage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_voyage", referencedColumnName="id_voyage")
     * })
     */
    private $idVoyage;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_passager", referencedColumnName="id_user")
     * })
     */
    private $idPassager;

    public function getIdBillet(): ?int
    {
        return $this->idBillet;
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

    public function getIdTarif(): ?Tarif
    {
        return $this->idTarif;
    }

    public function setIdTarif(?Tarif $idTarif): self
    {
        $this->idTarif = $idTarif;

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

    public function getIdVoyage(): ?Voyage
    {
        return $this->idVoyage;
    }

    public function setIdVoyage(?Voyage $idVoyage): self
    {
        $this->idVoyage = $idVoyage;

        return $this;
    }

    public function getIdPassager(): ?User
    {
        return $this->idPassager;
    }

    public function setIdPassager(?User $idPassager): self
    {
        $this->idPassager = $idPassager;

        return $this;
    }


}
