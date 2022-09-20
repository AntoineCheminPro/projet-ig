<?php 

namespace App\Entity\Trait;
use Doctrine\DBAL\Types\Types;


use Doctrine\ORM\Mapping as ORM;

trait CreatedAtTrait 
{

    #[ORM\column(type: 'datetime_immutable', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private $created_at;

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}