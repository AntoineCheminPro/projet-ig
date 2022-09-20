<?php

namespace App\Entity;

use App\Entity\Trait\SourcesTrait;
use App\Entity\Trait\ReciepeTrait;
use App\Entity\Trait\UserTrait;
use App\Entity\Trait\DescriptionTrait;
use App\Entity\Trait\ContentTrait;
use App\Entity\Trait\AlimentTrait;

use App\Repository\AlimentRepository;
use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    use SourcesTrait;
    use ContentTrait;
    use UserTrait;
    use AlimentTrait;


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $subject = null;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToMany(targetEntity: Aliment::class, mappedBy: 'article')]
    private Collection $aliments;

    #[ORM\ManyToMany(targetEntity: Receipe::class, mappedBy: 'article')]
    private Collection $receipes;

    public function __construct()
    {
        $this->aliments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }
}
