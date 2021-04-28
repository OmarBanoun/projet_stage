<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PsContrat
 *
 * @ORM\Table(name="ps_contrat")
 * @ORM\Entity
 */
class PsContrat
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
     * @ORM\Column(name="label", type="string", length=200, nullable=false)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=50, nullable=false)
     */
    private $reference;

    /**
     * @var int
     *
     * @ORM\Column(name="societymainId", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $societymainid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="societyannexeId", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $societyannexeid;

    /**
     * @var string
     *
     * @ORM\Column(name="pathcontrat", type="string", length=250, nullable=false)
     */
    private $pathcontrat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdate", type="datetime", nullable=false)
     */
    private $createdate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updatedate", type="datetime", nullable=true)
     */
    private $updatedate;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
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

    public function getSocietyannexeid(): ?int
    {
        return $this->societyannexeid;
    }

    public function setSocietyannexeid(?int $societyannexeid): self
    {
        $this->societyannexeid = $societyannexeid;

        return $this;
    }

    public function getPathcontrat(): ?string
    {
        return $this->pathcontrat;
    }

    public function setPathcontrat(string $pathcontrat): self
    {
        $this->pathcontrat = $pathcontrat;

        return $this;
    }

    public function getCreatedate(): ?\DateTimeInterface
    {
        return $this->createdate;
    }

    public function setCreatedate(\DateTimeInterface $createdate): self
    {
        $this->createdate = $createdate;

        return $this;
    }

    public function getUpdatedate(): ?\DateTimeInterface
    {
        return $this->updatedate;
    }

    public function setUpdatedate(?\DateTimeInterface $updatedate): self
    {
        $this->updatedate = $updatedate;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }


}
