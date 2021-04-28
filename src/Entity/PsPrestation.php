<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PsPrestation
 *
 * @ORM\Table(name="ps_prestation")
 * @ORM\Entity
 */
class PsPrestation
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
     * @ORM\Column(name="product", type="string", length=250, nullable=false)
     */
    private $product;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string", length=10, nullable=false)
     */
    private $price;

    /**
     * @var int
     *
     * @ORM\Column(name="annonceId", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $annonceid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ?string
    {
        return $this->product;
    }

    public function setProduct(string $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getAnnonceid(): ?int
    {
        return $this->annonceid;
    }

    public function setAnnonceid(int $annonceid): self
    {
        $this->annonceid = $annonceid;

        return $this;
    }


}
