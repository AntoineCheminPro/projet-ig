<?php 

namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;

trait ReciepeTrait 
{
     /**
     * @return Collection<int, Receipe>
     */
    public function getReceipes(): Collection
    {
        return $this->receipes;
    }

    public function addReceipe(Receipe $receipe): self
    {
        if (!$this->receipes->contains($receipe)) {
            $this->receipes->add($receipe);
            $receipe->addAliment($this);
        }

        return $this;
    }

    public function removeReceipe(Receipe $receipe): self
    {
        if ($this->receipes->removeElement($receipe)) {
            $receipe->removeAliment($this);
        }

        return $this;
    }
}