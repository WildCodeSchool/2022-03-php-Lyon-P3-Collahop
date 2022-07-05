<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticlesRepository::class)]
class Articles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Length(max: 80, maxMessage: 'Le titre est limité à 80 caractères')]
    private string $title;

    #[ORM\Column(type: 'string', length: 255)]
    private string $image;

    #[ORM\Column(type: 'text')]
    private string $articleContent;

    #[ORM\Column(type: 'text')]
    #[Assert\Length(max: 360, maxMessage: 'Le résumé est limité à 360 caractères')]
    private string $articleSumary;

    #[ORM\Column(type: 'date')]
    private \DateTimeInterface $date;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getArticleContent(): ?string
    {
        return $this->articleContent;
    }

    public function setArticleContent(string $articleContent): self
    {
        $this->articleContent = $articleContent;

        return $this;
    }

    public function getArticleSumary(): ?string
    {
        return $this->articleSumary;
    }

    public function setArticleSumary(string $articleSumary): self
    {
        $this->articleSumary = $articleSumary;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(): self
    {
        $this->date = new DateTime('now');

        return $this;
    }
}
