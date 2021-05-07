<?php

namespace App\Entity;

use App\Repository\PsSubscriptionDetailRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PsSubscriptionDetailRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class PsSubscriptionDetail
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $startDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $endDate;

    /**
     * @ORM\ManyToOne(targetEntity=PsSubscription::class, inversedBy="PsSubscriptionDetail")
     */
    private $subscription;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isExpired;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
 * @ORM\PrePersist
 * @ORM\PreUpdate
*/
public function updatedTimestamps(): void
{ 
    if ($this->getStartDate() === null) {
        $this->setStartDate(new \DateTime('now'));
    }
    if ($this->getEndDate() === null) {
        $this->setEndDate(new \DateTime('now'));
    }

}

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getSubscription(): ?PsSubscription
    {
        return $this->subscription;
    }

    public function setSubscription(?PsSubscription $subscription): self
    {
        $this->subscription = $subscription;

        return $this;
    }

    public function getIsExpired(): ?bool
    {
        return $this->isExpired;
    }

    public function setIsExpired(?bool $isExpired): self
    {
        $this->isExpired = $isExpired;

        return $this;
    }
}
