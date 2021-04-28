<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PsSocietyannexe
 *
 * @ORM\Table(name="ps_societyannexe")
 * @ORM\Entity
 */
class PsSocietyannexe
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
     * @ORM\Column(name="street", type="string", length=250, nullable=false)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=50, nullable=false)
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
     * @var int
     *
     * @ORM\Column(name="societyMainId", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $societymainid;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSocietymainid(): ?int
    {
        return $this->societymainid;
    }

    public function setSocietymainid(int $societymainid): self
    {
        $this->societymainid = $societymainid;

        return $this;
    }


}
