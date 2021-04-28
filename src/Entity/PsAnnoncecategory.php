<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PsAnnoncecategory
 *
 * @ORM\Table(name="ps_annoncecategory")
 * @ORM\Entity
 */
class PsAnnoncecategory
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
     * @ORM\Column(name="categoryId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $categoryid;

    public function getAnnonceid(): ?int
    {
        return $this->annonceid;
    }

    public function getCategoryid(): ?int
    {
        return $this->categoryid;
    }


}
