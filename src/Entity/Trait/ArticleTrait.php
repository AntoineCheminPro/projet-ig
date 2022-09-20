<?php 

namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;

trait ArticleTrait 
{

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