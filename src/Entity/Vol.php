<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Vol
 *
 * @ORM\Table(name="vol", indexes={@ORM\Index(name="id_avions", columns={"id_avions"}), @ORM\Index(name="id_aeroportD_Reel", columns={"id_aeroportD_Reel"}), @ORM\Index(name="aeroportA_Theo", columns={"aeroportA_Theo"}), @ORM\Index(name="aeroportA_Reel", columns={"aeroportA_Reel"}), @ORM\Index(name="id_trajet", columns={"id_trajet"})})
 * @ORM\Entity
 */
class Vol
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_vol", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVol;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateA", type="datetime", nullable=false)
     */
    private $datea;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateD", type="datetime", nullable=false)
     */
    private $dated;

    /**
     * @var bool
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateATheo", type="datetime", nullable=false)
     */
    private $dateatheo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDTheo", type="datetime", nullable=false)
     */
    private $datedtheo;

    /**
     * @var \Aeroport
     *
     * @ORM\ManyToOne(targetEntity="Aeroport")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="aeroportA_Reel", referencedColumnName="code_aita")
     * })
     */
    private $aeroportaReel;

    /**
     * @var \Aeroport
     *
     * @ORM\ManyToOne(targetEntity="Aeroport")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="aeroportA_Theo", referencedColumnName="code_aita")
     * })
     */
    private $aeroportaTheo;

    /**
     * @var \Aeroport
     *
     * @ORM\ManyToOne(targetEntity="Aeroport")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_aeroportD_Reel", referencedColumnName="code_aita")
     * })
     */
    private $idAeroportdReel;

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
     * @var \Avion
     *
     * @ORM\ManyToOne(targetEntity="Avion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_avions", referencedColumnName="id_avion")
     * })
     */
    private $idAvions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Voyage", mappedBy="idVol")
     */
    private $idVoyage;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idVoyage = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdVol(): ?int
    {
        return $this->idVol;
    }

    public function getDatea(): ?\DateTimeInterface
    {
        return $this->datea;
    }

    public function setDatea(\DateTimeInterface $datea): self
    {
        $this->datea = $datea;

        return $this;
    }

    public function getDated(): ?\DateTimeInterface
    {
        return $this->dated;
    }

    public function setDated(\DateTimeInterface $dated): self
    {
        $this->dated = $dated;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDateatheo(): ?\DateTimeInterface
    {
        return $this->dateatheo;
    }

    public function setDateatheo(\DateTimeInterface $dateatheo): self
    {
        $this->dateatheo = $dateatheo;

        return $this;
    }

    public function getDatedtheo(): ?\DateTimeInterface
    {
        return $this->datedtheo;
    }

    public function setDatedtheo(\DateTimeInterface $datedtheo): self
    {
        $this->datedtheo = $datedtheo;

        return $this;
    }

    public function getAeroportaReel(): ?Aeroport
    {
        return $this->aeroportaReel;
    }

    public function setAeroportaReel(?Aeroport $aeroportaReel): self
    {
        $this->aeroportaReel = $aeroportaReel;

        return $this;
    }

    public function getAeroportaTheo(): ?Aeroport
    {
        return $this->aeroportaTheo;
    }

    public function setAeroportaTheo(?Aeroport $aeroportaTheo): self
    {
        $this->aeroportaTheo = $aeroportaTheo;

        return $this;
    }

    public function getIdAeroportdReel(): ?Aeroport
    {
        return $this->idAeroportdReel;
    }

    public function setIdAeroportdReel(?Aeroport $idAeroportdReel): self
    {
        $this->idAeroportdReel = $idAeroportdReel;

        return $this;
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

    public function getIdAvions(): ?Avion
    {
        return $this->idAvions;
    }

    public function setIdAvions(?Avion $idAvions): self
    {
        $this->idAvions = $idAvions;

        return $this;
    }

    /**
     * @return Collection|Voyage[]
     */
    public function getIdVoyage(): Collection
    {
        return $this->idVoyage;
    }

    public function addIdVoyage(Voyage $idVoyage): self
    {
        if (!$this->idVoyage->contains($idVoyage)) {
            $this->idVoyage[] = $idVoyage;
            $idVoyage->addIdVol($this);
        }

        return $this;
    }

    public function removeIdVoyage(Voyage $idVoyage): self
    {
        if ($this->idVoyage->contains($idVoyage)) {
            $this->idVoyage->removeElement($idVoyage);
            $idVoyage->removeIdVol($this);
        }

        return $this;
    }

}
