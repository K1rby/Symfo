<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TarifClasse
 *
 * @ORM\Table(name="tarif_classe", indexes={@ORM\Index(name="id_tarif", columns={"id_tarif"}), @ORM\Index(name="id_classe", columns={"id_classe"})})
 * @ORM\Entity
 */
class TarifClasse
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_tarifclasse", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTarifclasse;

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

    public function getIdTarifclasse(): ?int
    {
        return $this->idTarifclasse;
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


}
