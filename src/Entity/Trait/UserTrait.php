<?php 

namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;

trait UserTrait 
{

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}