<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PsAnnoncecategoryoption
 *
 * @ORM\Table(name="ps_annoncecategoryoption")
 * @ORM\Entity
 */
class PsAnnoncecategoryoption
{
    /**
     * @var int
     *
     * @ORM\Column(name="annonceId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $annonceid;

    /**
     * @var int
     *
     * @ORM\Column(name="categoryoptionId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $categoryoptionid;

    public function getAnnonceid(): ?int
    {
        return $this->annonceid;
    }

    public function getCategoryoptionid(): ?int
    {
        return $this->categoryoptionid;
    }


}
