<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TrajetVol
 *
 * @ORM\Table(name="trajet_vol", indexes={@ORM\Index(name="id_vol", columns={"id_vol"}), @ORM\Index(name="id_trajet", columns={"id_trajet"})})
 * @ORM\Entity
 */
class TrajetVol
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_trajetvol", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTrajetvol;

    /**
     * @var \Trajet
     *
     * @ORM\ManyToOne(targetEntity="Trajet")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_trajet", referencedColumnName="id_trajet")
     * })
     */
    private $idTrajet;

    /**
     * @var \Vol
     *
     * @ORM\ManyToOne(targetEntity="Vol")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_vol", referencedColumnName="id_vol")
     * })
     */
    private $idVol;

    public function getIdTrajetvol(): ?int
    {
        return $this->idTrajetvol;
    }

    public function getIdTrajet(): ?Trajet
    {
        return $this->idTrajet;
    }

    public function setIdTrajet(?Trajet $idTrajet): self
    {
        $this->idTrajet = $idTrajet;

        return $this;
    }

    public function getIdVol(): ?Vol
    {
        return $this->idVol;
    }

    public function setIdVol(?Vol $idVol): self
    {
        $this->idVol = $idVol;

        return $this;
    }


}
