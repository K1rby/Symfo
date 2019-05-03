<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
 * @UniqueEntity(fields="adresseMail", message="Email already taken")
 */
class User implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_de_naissance", type="date", nullable=false)
     */
    private $dateDeNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_passeport", type="string", length=50, nullable=false)
     */
    private $numeroPasseport;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_mail", type="string", length=50, nullable=false)
     */
    private $adresseMail;

    /**
    * @Assert\NotBlank()
    * @Assert\Length(max=4096)
    */
   private $plainPassword;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=250, nullable=false)
     */
    private $password;

    /**
    * @ORM\Column(type="array")
    */
    private $roles;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reset_token", type="string", length=250, nullable=true)
     */
    private $resetToken;

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }
    public function __construct()
    {
        $this->roles = array('ROLE_USER');
    }
    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->dateDeNaissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $dateDeNaissance): self
    {
        $this->dateDeNaissance = $dateDeNaissance;

        return $this;
    }

    public function getNumeroPasseport(): ?string
    {
        return $this->numeroPasseport;
    }

    public function setNumeroPasseport(string $numeroPasseport): self
    {
        $this->numeroPasseport = $numeroPasseport;

        return $this;
    }
    public function getPlainPassword()
  {
      return $this->plainPassword;
  }

  public function setPlainPassword($password)
  {
      $this->plainPassword = $password;
  }

    public function getAdresseMail(): ?string
    {
        return $this->adresseMail;
    }

    public function setAdresseMail(string $adresseMail): self
    {
        $this->adresseMail = $adresseMail;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function setRoles(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getResetToken(): ?string
    {
        return $this->resetToken;
    }
    public function getUsername()
    {
        return $this->adresseMail;
    }

    public function setResetToken(?string $resetToken): self
    {
        $this->resetToken = $resetToken;

        return $this;
    }
    public function getSalt()
  {
      // The bcrypt and argon2i algorithms don't require a separate salt.
      // You *may* need a real salt if you choose a different encoder.
      return null;
  }
    public function eraseCredentials()
    {
    }
}
