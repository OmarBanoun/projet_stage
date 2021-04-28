<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PsFacture
 *
 * @ORM\Table(name="ps_facture")
 * @ORM\Entity
 */
class PsFacture
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
     * @ORM\Column(name="reference", type="string", length=100, nullable=false)
     */
    private $reference;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="societymainId", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $societymainid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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
