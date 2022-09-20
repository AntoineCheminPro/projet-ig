<?php

namespace App\Entity;

// TRAITS
use App\Entity\Trait\SourcesTrait;
use App\Entity\Trait\ContentTrait;
use App\Entity\Trait\UserTrait;
use App\Entity\Trait\DescriptionTrait;
use App\Entity\Trait\CreatedAtTrait;
use App\Entity\Trait\LastModificationTrait;


use App\Repository\ReceipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReceipeRepository::class)]
class Receipe
{

    use SourcesTrait;
    use ContentTrait;
    use UserTrait;
    use DescriptionTrait;
    use CreatedAtTrait;
    use LastModificationTrait;




    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'receipes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $cooking_time = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $number_of_persons = null;

    #[ORM\ManyToOne(inversedBy: 'reciepe')]
    private ?ReceipeAlimentQuantity $receipeAlimentQuantity = null;

    // initialisation du constructeur avec la date du jour
    public function __construct()
    {
        $this->aliments = new ArrayCollection();
        $this->created_at = new DateTimeImmutable();

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

    public function getReceipeAlimentQuantity(): ?ReceipeAlimentQuantity
    {
        return $this->receipeAlimentQuantity;
    }

    public function setReceipeAlimentQuantity(?ReceipeAlimentQuantity $receipeAlimentQuantity): self
    {
        $this->receipeAlimentQuantity = $receipeAlimentQuantity;

        return $this;
    }
}
