<?php 

namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;

trait SourcesTrait 
{

    #[ORM\Column(type: Types::TEXT)]
    private ?string $sources = null;

    public function getSources(): ?string
    {
        return $this->sources;
    }

    public function setSources(string $sources): self
    {
        $this->sources = $sources;

        return $this;
    }

}