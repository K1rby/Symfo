<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aeroport
 *
 * @ORM\Table(name="aeroport")
 * @ORM\Entity
 */
class Aeroport
{
    /**
     * @var string
     *
     * @ORM\Column(name="code_aita", type="string", length=30, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeAita;

    /**
     * @var string|null
     *
     * @ORM\Column(name="code_ville", type="string", length=30, nullable=true)
     */
    private $codeVille;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=30, nullable=false)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=100, nullable=false)
     */
    private $pays;

    /**
     * @var string|null
     *
     * @ORM\Column(name="code_pays", type="string", length=10, nullable=true)
     */
    private $codePays;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="city", type="boolean", nullable=true)
     */
    private $city;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numero_aeroport", type="integer", nullable=true)
     */
    private $numeroAeroport;

    /**
     * @var float|null
     *
     * @ORM\Column(name="longitude", type="float", precision=10, scale=0, nullable=true)
     */
    private $longitude;

    /**
     * @var float|null
     *
     * @ORM\Column(name="latitude", type="float", precision=10, scale=0, nullable=true)
     */
    private $latitude;

    /**
     * @var float|null
     *
     * @ORM\Column(name="timezone", type="float", precision=10, scale=0, nullable=true)
     */
    private $timezone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    public function getCodeAita(): ?string
    {
        return $this->codeAita;
    }

    public function getCodeVille(): ?string
    {
        return $this->codeVille;
    }

    public function setCodeVille(?string $codeVille): self
    {
        $this->codeVille = $codeVille;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getCodePays(): ?string
    {
        return $this->codePays;
    }

    public function setCodePays(?string $codePays): self
    {
        $this->codePays = $codePays;

        return $this;
    }

    public function getCity(): ?bool
    {
        return $this->city;
    }

    public function setCity(?bool $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getNumeroAeroport(): ?int
    {
        return $this->numeroAeroport;
    }

    public function setNumeroAeroport(?int $numeroAeroport): self
    {
        $this->numeroAeroport = $numeroAeroport;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(?float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(?float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getTimezone(): ?float
    {
        return $this->timezone;
    }

    public function setTimezone(?float $timezone): self
    {
        $this->timezone = $timezone;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }


}
