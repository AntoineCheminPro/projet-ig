<?php 

namespace App\Entity\Trait;
use Doctrine\DBAL\Types\Types;

use Doctrine\ORM\Mapping as ORM;

trait LastModificationTrait 
{

    #[ORM\column(type: 'datetime_immutable', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private $last_modification;

    public function getLastModification(): ?\DateTimeImmutable
    {
        return $this->last_modification;
    }

    public function setLastModification(\DateTimeImmutable $last_modification): self
    {
        $this->last_modification = $last_modification;

        return $this;
    }
}