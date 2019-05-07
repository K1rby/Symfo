<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HistoriqueBillet
 *
 * @ORM\Table(name="historique_billet", indexes={@ORM\Index(name="id_passager", columns={"id_passager"}), @ORM\Index(name="id_prix", columns={"id_prix"})})
 * @ORM\Entity
 */
class HistoriqueBillet
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_historiquebillet", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idHistoriquebillet;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_achat", type="datetime", nullable=false)
     */
    private $dateAchat;

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
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_passager", referencedColumnName="id_user")
     * })
     */
    private $idPassager;

    public function getIdHistoriquebillet(): ?int
    {
        return $this->idHistoriquebillet;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->dateAchat;
    }

    public function setDateAchat(\DateTimeInterface $dateAchat): self
    {
        $this->dateAchat = $dateAchat;

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
