<?php 

namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;

trait AlimentTrait 
{

    /**
     * @return Collection<int, Aliment>
     */
    public function getAliments(): Collection
    {
        return $this->aliments;
    }

    public function addAliment(Aliment $aliment): self
    {
        if (!$this->aliments->contains($aliment)) {
            $this->aliments->add($aliment);
            $aliment->addArticle($this);
        }

        return $this;
    }

    public function removeAliment(Aliment $aliment): self
    {
        if ($this->aliments->removeElement($aliment)) {
            $aliment->removeArticle($this);
        }

        return $this;
    }

}