<?php

namespace App\Entity;

use App\Repository\AlimentRepository;
use App\Entity\Trait\SourcesTrait;
use App\Entity\Trait\ArticleTrait;
use App\Entity\Trait\ReciepeTrait;
use App\Entity\Trait\UserTrait;
use App\Entity\Trait\DescriptionTrait;
use App\Entity\Trait\CreatedAtTrait;
use App\Entity\Trait\LastModificationTrait;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlimentRepository::class)]
class Aliment
{
    use SourcesTrait;
    use ArticleTrait;
    use ReciepeTrait;
    use UserTrait;
    use DescriptionTrait;
    use CreatedAtTrait;
    use LastModificationTrait;


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // id
    #[ORM\Column(nullable: true)]
    private ?float $joules = null;

    #[ORM\ManyToOne(inversedBy: 'aliment')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    // calories
    #[ORM\Column(nullable: true)]
    private ?float $calories = null;

    // glucides
    #[ORM\Column(nullable: true)]
    private ?float $carbohydrate = null;

    // amidon
    #[ORM\Column(nullable: true)]
    private ?float $starch = null;

    // sucres
    #[ORM\Column(nullable: true)]
    private ?float $sugars = null;

    // fibres
    #[ORM\Column(nullable: true)]
    private ?float $dietary_fibres = null;

    // proteines
    #[ORM\Column(nullable: true)]
    private ?float $proteins = null;

    // lipides
    #[ORM\Column(nullable: true)]
    private ?float $lipids = null;

    // graisses saturées
    #[ORM\Column(nullable: true)]
    private ?float $saturated_fats = null;

    // omega 3
    #[ORM\Column(nullable: true)]
    private ?float $omega_3 = null;

    // omega 6
    #[ORM\Column(nullable: true)]
    private ?float $omega_6 = null;

    // omega 9
    #[ORM\Column(nullable: true)]
    private ?float $omega_9 = null;

    // eau
    #[ORM\Column(nullable: true)]
    private ?float $water = null;

    // cendres
    #[ORM\Column(nullable: true)]
    private ?float $ashes = null;


   #[ORM\ManyToMany(targetEntity: article::class, inversedBy: 'aliments')]
    private Collection $article;

    #[ORM\ManyToMany(targetEntity: Receipe::class, mappedBy: 'aliments')]
    private Collection $receipes;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    // index glycémique
    #[ORM\Column]
    private ?int $glycemic_index = null;

    // charge glycémique
    #[ORM\Column]
    private ?int $glycemic_load = null;

    #[ORM\ManyToOne(inversedBy: 'aliment')]
    private ?ReceipeAlimentQuantity $receipeAlimentQuantity = null;

    public function __construct()
    {
        $this->article = new ArrayCollection();
        $this->receipes = new ArrayCollection();
        // $this->created_at = new DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJoules(): ?float
    {
        return $this->joules;
    }

    public function setJoules(?float $joules): self
    {
        $this->joules = $joules;

        return $this;
    }

    public function getCalories(): ?float
    {
        return $this->calories;
    }

    public function setCalories(?float $calories): self
    {
        $this->calories = $calories;

        return $this;
    }

    public function getCarbohydrate(): ?float
    {
        return $this->carbohydrate;
    }

    public function setCarbohydrate(?float $carbohydrate): self
    {
        $this->carbohydrate = $carbohydrate;

        return $this;
    }

    public function getStarch(): ?float
    {
        return $this->starch;
    }

    public function setStarch(?float $starch): self
    {
        $this->starch = $starch;

        return $this;
    }

    public function getSugars(): ?float
    {
        return $this->sugars;
    }

    public function setSugars(?float $sugars): self
    {
        $this->sugars = $sugars;

        return $this;
    }

    public function getDietaryFibres(): ?float
    {
        return $this->dietary_fibres;
    }

    public function setDietaryFibres(?float $dietary_fibres): self
    {
        $this->dietary_fibres = $dietary_fibres;

        return $this;
    }

    public function getProteins(): ?float
    {
        return $this->proteins;
    }

    public function setProteins(?float $proteins): self
    {
        $this->proteins = $proteins;

        return $this;
    }

    public function getLipids(): ?float
    {
        return $this->lipids;
    }

    public function setLipids(?float $lipids): self
    {
        $this->lipids = $lipids;

        return $this;
    }

    public function getSaturatedFats(): ?float
    {
        return $this->saturated_fats;
    }

    public function setSaturatedFats(?float $saturated_fats): self
    {
        $this->saturated_fats = $saturated_fats;

        return $this;
    }

    public function getOmega3(): ?float
    {
        return $this->omega_3;
    }

    public function setOmega3(?float $omega_3): self
    {
        $this->omega_3 = $omega_3;

        return $this;
    }

    public function getOmega6(): ?float
    {
        return $this->omega_6;
    }

    public function setOmega6(?float $omega_6): self
    {
        $this->omega_6 = $omega_6;

        return $this;
    }

    public function getOmega9(): ?float
    {
        return $this->omega_9;
    }

    public function setOmega9(?float $omega_9): self
    {
        $this->omega_9 = $omega_9;

        return $this;
    }

    public function getWater(): ?float
    {
        return $this->water;
    }

    public function setWater(?float $water): self
    {
        $this->water = $water;

        return $this;
    }

    public function getAshes(): ?float
    {
        return $this->ashes;
    }

    public function setAshes(float $ashes): self
    {
        $this->ashes = $ashes;

        return $this;
    }
   
    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getGlycemicIndex(): ?int
    {
        return $this->glycemic_index;
    }

    public function setGlycemicIndex(int $glycemic_index): self
    {
        $this->glycemic_index = $glycemic_index;

        return $this;
    }

    public function getGlycemicLoad(): ?int
    {
        return $this->glycemic_load;
    }

    public function setGlycemicLoad(int $glycemic_load): self
    {
        $this->glycemic_load = $glycemic_load;

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
