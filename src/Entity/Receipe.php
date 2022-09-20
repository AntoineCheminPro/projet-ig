<?php

namespace App\Entity;

use App\Repository\ReceipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReceipeRepository::class)]
class Receipe
{

    use SourcesTrait;
    use ContentTRait;
    use UserTrait;
    use AlimentTrait;
    use DescriptionTrait;



    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'receipes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToMany(targetEntity: Aliment::class, inversedBy: 'receipes')]
    private Collection $aliments;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $cooking_time = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $number_of_persons = null;

   
    public function __construct()
    {
        $this->aliments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCookingTime(): ?int
    {
        return $this->cooking_time;
    }

    public function setCookingTime(int $cooking_time): self
    {
        $this->cooking_time = $cooking_time;

        return $this;
    }

    public function getNumberOfPersons(): ?int
    {
        return $this->number_of_persons;
    }

    public function setNumberOfPersons(int $number_of_persons): self
    {
        $this->number_of_persons = $number_of_persons;

        return $this;
    }
}
