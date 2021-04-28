<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PsImageannonce
 *
 * @ORM\Table(name="ps_imageannonce")
 * @ORM\Entity
 */
class PsImageannonce
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
     * @var int
     *
     * @ORM\Column(name="imageId", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $imageid;

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

    public function getImageid(): ?int
    {
        return $this->imageid;
    }

    public function setImageid(int $imageid): self
    {
        $this->imageid = $imageid;

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
