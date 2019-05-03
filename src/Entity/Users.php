<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
 * @UniqueEntity(fields="adresse_mail", message="Email already taken")
 */
class Users implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_de_naissance;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $numero_passeport;

    /**
     * @ORM\Column(type="string", length=50, unique=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $adresse_mail;

    /**
    * @Assert\NotBlank()
    * @Assert\Length(max=4096)
    */
   private $plainPassword;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $password;

    /**
    * @ORM\Column(type="array")
    */
    private $roles;

    /**
    * @var string le token qui servira lors de l'oubli de mot de passe
    * @ORM\Column(type="string", length=255, nullable=true)
    */
    protected $reset_token;

    /**
    * @return string
    */
    public function getResetToken(): string
    {
      return $this->reset_token;
    }

    /**
    * @param string $reset_token
    */
    public function setResetToken(?string $reset_token): void
    {
      $this->reset_token = $reset_token;
    }
   public function __construct()
   {
       $this->roles = array('ROLE_USER');
   }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->date_de_naissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $date_de_naissance): self
    {
        $this->date_de_naissance = $date_de_naissance;

        return $this;
    }

    public function getNumeroPasseport(): ?string
    {
        return $this->numero_passeport;
    }

    public function setNumeroPasseport(string $numero_passeport): self
    {
        $this->numero_passeport = $numero_passeport;

        return $this;
    }

    public function getAdresseMail(): ?string
    {
        return $this->adresse_mail;
    }
    public function getUsername()
    {
        return $this->adresse_mail;
    }

    public function setAdresseMail(string $adresse_mail): self
    {
        $this->adresse_mail = $adresse_mail;

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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
    public function getSalt()
  {
      // The bcrypt and argon2i algorithms don't require a separate salt.
      // You *may* need a real salt if you choose a different encoder.
      return null;
  }
  public function getRoles()
 {
     return $this->roles;
 }

  public function eraseCredentials()
  {
  }

  public function setRoles(array $roles): self
  {
      $this->roles = $roles;

      return $this;
  }
}
