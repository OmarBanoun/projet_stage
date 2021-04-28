<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * PsCategory
 *
 * @ORM\Table(name="ps_category")
 * @ORM\Entity
 */
class PsCategory
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
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="parentId", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $parentid;

    /**
     * @ORM\OneToMany(targetEntity=PsAnnonce::class, mappedBy="categorie", orphanRemoval=true)
     */
    private $annonces;

    public function __construct()
    {
        $this->annonces = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->nom;
    }

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

    public function getParentid(): ?int
    {
        return $this->parentid;
    }

    public function setParentid(int $parentid): self
    {
        $this->parentid = $parentid;

        return $this;
    }

        /**
     * @return Collection|Annonce[]
     */
    public function getAnnonce(): Collection
    {
        return $this->postChats;
    }

    public function addAnnonce(PsAnnonce $annonce): self
    {
        if (!$this->postChats->contains($annonce)) {
            $this->postChats[] = $annonce;
            $annonce->setCategorie($this);
        }

        return $this;
    }

    public function removePostChat(PsAnnonce $annonce): self
    {
        if ($this->postChats->removeElement($annonce)) {
            // set the owning side to null (unless already changed)
            if ($annonce->getCategorie() === $this) {
                $annonce->setCategorie(null);
            }
        }

        return $this;
    }


}
