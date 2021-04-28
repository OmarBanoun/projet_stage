<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;


/**
 * PsUser
 *
 * @ORM\Table(name="ps_user")
 * @ORM\Entity
 */
class PsUser implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(type="json")
     */
    private $role = [];

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=150, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=150, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=150, nullable=false)
     */
    private $login;

    /**
     * @var string The hashed password
     *
     * @ORM\Column(name="password", type="string", length=250, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="number", type="string", length=10, nullable=false)
     */
    private $number;

    /**
     * @var string|null
     *
     * @ORM\Column(name="number_complement", type="string", length=5, nullable=true)
     */
    private $numberComplement;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=250, nullable=false)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=150, nullable=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=150, nullable=false)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="postal_code", type="string", length=20, nullable=false)
     */
    private $postalCode;

    /**
     * @ORM\OneToMany(targetEntity=Annonce::class, mappedBy="ps_user", orphanRemoval=true)
     */
    private $annonces;

    /**
     * @ORM\ManyToOne(targetEntity=PsSubscription::class, inversedBy="Users")
     */
    private $subscription;


    /**
    * @return string
    */
    public function __toString()
    { 
        return (string) $this->getId();
    }

    public function __construct()
    {
        $this->annonces = new ArrayCollection();
        $this->subscription = new ArrayCollection();

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->login;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $role = $this->role;
        // guarantee every user at least has ROLE_USER
        $role[] = 'ROLE_USER';

        return array_unique($role);
    }

    public function setRoles(array $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getRole(): ?array
    {
        return $this->role;
    }

    public function setRole(array $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        global $kernel;
        if (method_exists($kernel, 'getKernel'))
            $kernel = $kernel->getKernel();

        $this->password = $kernel->getContainer()->get('security.password_encoder')->encodePassword($this, $password);
        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getNumberComplement(): ?string
    {
        return $this->numberComplement;
    }

    public function setNumberComplement(?string $numberComplement): self
    {
        $this->numberComplement = $numberComplement;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    // Relation
    /**
     * @return Collection|Annonce[]
     */
    public function getAnnonces(): Collection
    {
        return $this->annonces;
    }

    public function addAnnonce(Annonce $annonce): self
    {
        if (!$this->annonces->contains($annonce)) {
            $this->annonces[] = $annonce;
            $annonce->setUser($this);
        }

        return $this;
    }

    public function removeAnnonce(Annonce $annonce): self
    {
        if ($this->annonces->removeElement($annonce)) {
            // set the owning side to null (unless already changed)
            if ($annonce->getUser() === $this) {
                $annonce->setUser(null);
            }
        }

        return $this;
    }

    public function getSubscription(): ?psSubscription
    {
        return $this->subscription;
    }

    public function setSubscription(?psSubscription $subscription): self
    {
        $this->subscription = $subscription;

        return $this;
    }

        /**
     * @return Collection|PsSubscription[]
     */
    public function getSubscriptions(): Collection
    {
        return $this->subscriptions;
    }

    public function addSubscription(PsSubscription $subscription): self
    {
        if (!$this->subscriptions->contains($subscription)) {
            $this->subscriptions[] = $subscription;
        }

        return $this;
    }

    public function removeSubscription(PsSubscription $subscription): self
    {
        if ($this->annonces->removeElement($subscription)) {
            // set the owning side to null (unless already changed)
            if ($subscription->getUsers() === $this) {
            }
        }

        return $this;
    }


}
