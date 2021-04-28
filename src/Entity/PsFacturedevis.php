<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PsFacturedevis
 *
 * @ORM\Table(name="ps_facturedevis")
 * @ORM\Entity(repositoryClass="App\Repository\PsFactureDevisRepository")
 */
class PsFacturedevis
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
     * @var int
     *
     * @ORM\Column(name="societymainId", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $societymainid;

    /**
     * @var int
     *
     * @ORM\Column(name="statut", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $statut;

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

    public function getSocietymainid(): ?int
    {
        return $this->societymainid;
    }

    public function setSocietymainid(int $societymainid): self
    {
        $this->societymainid = $societymainid;

        return $this;
    }

    public function getStatut(): ?int
    {
        return $this->statut;
    }

    public function setStatut(int $statut): self
    {
        $this->statut = $statut;

        return $this;
    }


}
