<?php

namespace App\Entity;

use App\Repository\AlimentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlimentRepository::class)]
class Aliment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?float $joules = null;

    #[ORM\Column(nullable: true)]
    private ?float $calories = null;

    #[ORM\Column(nullable: true)]
    private ?float $carbohydrate = null;

    #[ORM\Column(nullable: true)]
    private ?float $starch = null;

    #[ORM\Column(nullable: true)]
    private ?float $sugars = null;

    #[ORM\Column(nullable: true)]
    private ?float $dietary_fibres = null;

    #[ORM\Column(nullable: true)]
    private ?float $proteins = null;

    #[ORM\Column(nullable: true)]
    private ?float $lipids = null;

    #[ORM\Column(nullable: true)]
    private ?float $saturated_fats = null;

    #[ORM\Column(nullable: true)]
    private ?float $omega_3 = null;

    #[ORM\Column(nullable: true)]
    private ?float $omega_6 = null;

    #[ORM\Column(nullable: true)]
    private ?float $omega_9 = null;

    #[ORM\Column(nullable: true)]
    private ?float $water = null;

    #[ORM\Column]
    private ?float $ashes = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $sources = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: article::class, inversedBy: 'aliments')]
    private Collection $article;

    public function __construct()
    {
        $this->article = new ArrayCollection();
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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getSources(): ?string
    {
        return $this->sources;
    }

    public function setSources(?string $sources): self
    {
        $this->sources = $sources;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, article>
     */
    public function getArticle(): Collection
    {
        return $this->article;
    }

    public function addArticle(article $article): self
    {
        if (!$this->article->contains($article)) {
            $this->article->add($article);
        }

        return $this;
    }

    public function removeArticle(article $article): self
    {
        $this->article->removeElement($article);

        return $this;
    }
}
