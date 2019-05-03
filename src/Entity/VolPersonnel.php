<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VolPersonnel
 *
 * @ORM\Table(name="vol_personnel", indexes={@ORM\Index(name="id_vol", columns={"id_vol"}), @ORM\Index(name="id_personnel", columns={"id_personnel"})})
 * @ORM\Entity
 */
class VolPersonnel
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_volpersonnel", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVolpersonnel;

    /**
     * @var \Personnel
     *
     * @ORM\ManyToOne(targetEntity="Personnel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_personnel", referencedColumnName="id_personnel")
     * })
     */
    private $idPersonnel;

    /**
     * @var \Vol
     *
     * @ORM\ManyToOne(targetEntity="Vol")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_vol", referencedColumnName="id_vol")
     * })
     */
    private $idVol;

    public function getIdVolpersonnel(): ?int
    {
        return $this->idVolpersonnel;
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
