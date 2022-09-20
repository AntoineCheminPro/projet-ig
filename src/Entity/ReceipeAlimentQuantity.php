<?php

namespace App\Entity;

use App\Repository\ReceipeAlimentQuantityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReceipeAlimentQuantityRepository::class)]
class ReceipeAlimentQuantity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'receipeAlimentQuantity', targetEntity: Receipe::class)]
    private Collection $reciepe;

    #[ORM\OneToMany(mappedBy: 'receipeAlimentQuantity', targetEntity: Aliment::class)]
    private Collection $aliment;

    #[ORM\Column(nullable: true)]
    private ?float $quantity = null;

    public function __construct()
    {
        $this->reciepe = new ArrayCollection();
        $this->aliment = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Receipe>
     */
    public function getReciepe(): Collection
    {
        return $this->reciepe;
    }

    public function addReciepe(Receipe $reciepe): self
    {
        if (!$this->reciepe->contains($reciepe)) {
            $this->reciepe->add($reciepe);
            $reciepe->setReceipeAlimentQuantity($this);
        }

        return $this;
    }

    public function removeReciepe(Receipe $reciepe): self
    {
        if ($this->reciepe->removeElement($reciepe)) {
            // set the owning side to null (unless already changed)
            if ($reciepe->getReceipeAlimentQuantity() === $this) {
                $reciepe->setReceipeAlimentQuantity(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Aliment>
     */
    public function getAliment(): Collection
    {
        return $this->aliment;
    }

    public function addAliment(Aliment $aliment): self
    {
        if (!$this->aliment->contains($aliment)) {
            $this->aliment->add($aliment);
            $aliment->setReceipeAlimentQuantity($this);
        }

        return $this;
    }

    public function removeAliment(Aliment $aliment): self
    {
        if ($this->aliment->removeElement($aliment)) {
            // set the owning side to null (unless already changed)
            if ($aliment->getReceipeAlimentQuantity() === $this) {
                $aliment->setReceipeAlimentQuantity(null);
            }
        }

        return $this;
    }

    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    public function setQuantity(?float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }
}
