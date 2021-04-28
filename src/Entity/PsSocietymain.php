<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PsSocietymain
 *
 * @ORM\Table(name="ps_societymain")
 * @ORM\Entity
 */
class PsSocietymain
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="number", type="string", length=10, nullable=false)
     */
    private $number;

    /**
     * @var string|null
     *
     * @ORM\Column(name="number_complement", type="string", length=10, nullable=true)
     */
    private $numberComplement;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=150, nullable=false)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=100, nullable=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=50, nullable=false)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="postal_code", type="string", length=20, nullable=false)
     */
    private $postalCode;

    /**
     * @var string
     *
     * @ORM\Column(name="siret", type="string", length=100, nullable=false)
     */
    private $siret;

    /**
     * @var string
     *
     * @ORM\Column(name="naf_code", type="string", length=100, nullable=false)
     */
    private $nafCode;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(string $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    public function getNafCode(): ?string
    {
        return $this->nafCode;
    }

    public function setNafCode(string $nafCode): self
    {
        $this->nafCode = $nafCode;

        return $this;
    }


}
