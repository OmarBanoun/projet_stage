<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PsAvis
 *
 * @ORM\Table(name="ps_avis")
 * @ORM\Entity
 */
class PsAvis
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
     * @ORM\Column(name="content", type="text", length=65535, nullable=false)
     */
    private $content;

    /**
     * @var int
     *
     * @ORM\Column(name="annonceId", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $annonceid;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="name_guest", type="string", length=20, nullable=false)
     */
    private $nameGuest;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

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

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getNameGuest(): ?string
    {
        return $this->nameGuest;
    }

    public function setNameGuest(string $nameGuest): self
    {
        $this->nameGuest = $nameGuest;

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


}
