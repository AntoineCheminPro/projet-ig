<?php 

namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;

trait DescriptionTrait 
{
    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

}