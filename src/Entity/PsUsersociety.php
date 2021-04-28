<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PsUsersociety
 *
 * @ORM\Table(name="ps_usersociety")
 * @ORM\Entity
 */
class PsUsersociety
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
     * @ORM\Column(name="userId", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $userid;

    /**
     * @var int
     *
     * @ORM\Column(name="societymainId", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $societymainid;

    /**
     * @var int
     *
     * @ORM\Column(name="societyannexeId", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $societyannexeid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserid(): ?int
    {
        return $this->userid;
    }

    public function setUserid(int $userid): self
    {
        $this->userid = $userid;

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

    public function getSocietyannexeid(): ?int
    {
        return $this->societyannexeid;
    }

    public function setSocietyannexeid(int $societyannexeid): self
    {
        $this->societyannexeid = $societyannexeid;

        return $this;
    }


}
