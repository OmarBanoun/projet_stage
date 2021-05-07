<?php

namespace App\Entity;

use Serializable;
use App\Entity\PsUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use App\Repository\PsSubscriptionRepository;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=PsSubscriptionRepository::class)
 * @Vich\Uploadable
 * @ORM\HasLifecycleCallbacks
 */
class PsSubscription implements Serializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $prix;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $image;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="subscription_upload", fileNameProperty="image", )
     * 
     * @var File|null
     */
    private $imageFile;

    public function serialize()
    {
        $this->imageFile = base64_encode($this->imageFile);
    }

    public function unserialize($serialized)
    {
        $this->imageFile = base64_decode($this->imageFile);

    }

    /**
     * @ORM\OneToMany(targetEntity=PsUser::class, mappedBy="subscription")
     */
    private $Users;

    /**
     * @ORM\Column(type="dateinterval")
     */
    private $duration;

    /**
     * @ORM\OneToMany(targetEntity=PsSubscriptionDetail::class, mappedBy="subscription")
     */
    private $PsSubscriptionDetail;

    public function __toString() {
        return $this->name;
    }

    public function __construct()
    {
        $this->Users = new ArrayCollection();
        $this->PsSubscriptionDetail = new ArrayCollection();
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

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }
    


/**
 * @return Collection|PsUser[]
 */
public function getUsers(): Collection
{
    return $this->Users;
}

public function addUser(PsUser $user): self
{
    if (!$this->Users->contains($user)) {
        $this->Users[] = $user;
        $user->setSubscription($this);
    }

    return $this;
}

public function removeUser(PsUser $user): self
{
    if ($this->Users->removeElement($user)) {
        // set the owning side to null (unless already changed)
        if ($user->getSubscription() === $this) {
            $user->setSubscription(null);
        }
    }

    return $this;
}

public function getDuration(): ?\DateInterval
{
    return $this->duration;
}

public function setDuration(\DateInterval $duration): self
{
    $this->duration = $duration;

    return $this;
}

/**
 * @return Collection|PsSubscriptionDetail[]
 */
public function getPsSubscriptionDetail(): Collection
{
    return $this->PsSubscriptionDetail;
}

public function addPsSubscriptionDetail(PsSubscriptionDetail $psSubscriptionDetail): self
{
    if (!$this->PsSubscriptionDetail->contains($psSubscriptionDetail)) {
        $this->PsSubscriptionDetail[] = $psSubscriptionDetail;
        $psSubscriptionDetail->setSubscription($this);
    }

    return $this;
}

public function removePsSubscriptionDetail(PsSubscriptionDetail $psSubscriptionDetail): self
{
    if ($this->PsSubscriptionDetail->removeElement($psSubscriptionDetail)) {
        // set the owning side to null (unless already changed)
        if ($psSubscriptionDetail->getSubscription() === $this) {
            $psSubscriptionDetail->setSubscription(null);
        }
    }

    return $this;
}


}
