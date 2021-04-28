<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PsFactureprestation
 *
 * @ORM\Table(name="ps_factureprestation")
 * @ORM\Entity
 */
class PsFactureprestation
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
     * @ORM\Column(name="prestationId", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $prestationid;

    /**
     * @var int
     *
     * @ORM\Column(name="factureId", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $factureid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="devisId", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $devisid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrestationid(): ?int
    {
        return $this->prestationid;
    }

    public function setPrestationid(int $prestationid): self
    {
        $this->prestationid = $prestationid;

        return $this;
    }

    public function getFactureid(): ?int
    {
        return $this->factureid;
    }

    public function setFactureid(int $factureid): self
    {
        $this->factureid = $factureid;

        return $this;
    }

    public function getDevisid(): ?int
    {
        return $this->devisid;
    }

    public function setDevisid(?int $devisid): self
    {
        $this->devisid = $devisid;

        return $this;
    }


}
