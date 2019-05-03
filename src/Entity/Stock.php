<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stock
 *
 * @ORM\Table(name="stock", indexes={@ORM\Index(name="id_avion", columns={"id_avion"})})
 * @ORM\Entity
 */
class Stock
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_stock", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idStock;

    /**
     * @var int
     *
     * @ORM\Column(name="repas", type="integer", nullable=false)
     */
    private $repas;

    /**
     * @var int
     *
     * @ORM\Column(name="boisson", type="integer", nullable=false)
     */
    private $boisson;

    /**
     * @var int
     *
     * @ORM\Column(name="magazine", type="integer", nullable=false)
     */
    private $magazine;

    /**
     * @var int
     *
     * @ORM\Column(name="produit_hygienique", type="integer", nullable=false)
     */
    private $produitHygienique;

    /**
     * @var \Avion
     *
     * @ORM\ManyToOne(targetEntity="Avion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_avion", referencedColumnName="id_avion")
     * })
     */
    private $idAvion;

    public function getIdStock(): ?int
    {
        return $this->idStock;
    }

    public function getRepas(): ?int
    {
        return $this->repas;
    }

    public function setRepas(int $repas): self
    {
        $this->repas = $repas;

        return $this;
    }

    public function getBoisson(): ?int
    {
        return $this->boisson;
    }

    public function setBoisson(int $boisson): self
    {
        $this->boisson = $boisson;

        return $this;
    }

    public function getMagazine(): ?int
    {
        return $this->magazine;
    }

    public function setMagazine(int $magazine): self
    {
        $this->magazine = $magazine;

        return $this;
    }

    public function getProduitHygienique(): ?int
    {
        return $this->produitHygienique;
    }

    public function setProduitHygienique(int $produitHygienique): self
    {
        $this->produitHygienique = $produitHygienique;

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
