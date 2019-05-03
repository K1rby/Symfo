<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipe
 *
 * @ORM\Table(name="equipe", indexes={@ORM\Index(name="id_responsable", columns={"id_responsable"}), @ORM\Index(name="id_personnel", columns={"id_personnel"})})
 * @ORM\Entity
 */
class Equipe
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_equipe", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEquipe;

    /**
     * @var int
     *
     * @ORM\Column(name="nombre_pers_presente", type="integer", nullable=false)
     */
    private $nombrePersPresente;

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
     * @var \Personnel
     *
     * @ORM\ManyToOne(targetEntity="Personnel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_responsable", referencedColumnName="id_personnel")
     * })
     */
    private $idResponsable;

    public function getIdEquipe(): ?int
    {
        return $this->idEquipe;
    }

    public function getNombrePersPresente(): ?int
    {
        return $this->nombrePersPresente;
    }

    public function setNombrePersPresente(int $nombrePersPresente): self
    {
        $this->nombrePersPresente = $nombrePersPresente;

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

    public function getIdResponsable(): ?Personnel
    {
        return $this->idResponsable;
    }

    public function setIdResponsable(?Personnel $idResponsable): self
    {
        $this->idResponsable = $idResponsable;

        return $this;
    }


}
