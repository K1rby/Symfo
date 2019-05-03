<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prix
 *
 * @ORM\Table(name="prix", indexes={@ORM\Index(name="id_tarif", columns={"id_tarif"}), @ORM\Index(name="id_voyage", columns={"id_voyage"}), @ORM\Index(name="id_classe", columns={"id_classe"})})
 * @ORM\Entity
 */
class Prix
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_prix", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPrix;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;

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
     * @var \Tarif
     *
     * @ORM\ManyToOne(targetEntity="Tarif")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tarif", referencedColumnName="id_tarif")
     * })
     */
    private $idTarif;

    /**
     * @var \Voyage
     *
     * @ORM\ManyToOne(targetEntity="Voyage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_voyage", referencedColumnName="id_voyage")
     * })
     */
    private $idVoyage;

    public function getIdPrix(): ?int
    {
        return $this->idPrix;
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

    public function getIdClasse(): ?Classe
    {
        return $this->idClasse;
    }

    public function setIdClasse(?Classe $idClasse): self
    {
        $this->idClasse = $idClasse;

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
