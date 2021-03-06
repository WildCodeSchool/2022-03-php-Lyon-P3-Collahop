<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ContactRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use DateTime;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'Veuillez compléter ce champ')]
    #[Assert\Length(max: 255, maxMessage: 'Le prénom saisi est trop long, il ne devrait pas dépasser
     {{ limit }} caractères')]
    #[Assert\Type('string')]
    private string $firstname;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'Veuillez compléter ce champ')]
    #[Assert\Length(max: 255, maxMessage: 'Le nom saisi est trop long, il ne devrait pas dépasser
     {{ limit }} caractères')]
    #[Assert\Type('string')]
    private string $lastname;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'Veuillez compléter ce champ')]
    #[Assert\Length(max: 255, maxMessage: 'Le nom de société saisi est trop long, il ne devrait pas dépasser
     {{ limit }} caractères')]
    #[Assert\Type('string')]
    private string $company;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'Veuillez compléter ce champ')]
    #[Assert\Length(max: 255, maxMessage: 'L\'adresse email saisie est trop longue, elle ne devrait pas dépasser
     {{ limit }} caractères')]
    #[Assert\Email(message: 'L\'adresse email saisie n\'est pas valide')]
    private string $email;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Assert\Type('string')]
    private ?string $message = null;

    #[ORM\Column(type: 'datetime')]
    private DateTimeInterface $createdAt;

    #[ORM\Column(type: 'boolean')]
    private bool $newsletterSubscribe = false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message = ''): self
    {
        $this->message = $message;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(): self
    {
        $this->createdAt = new Datetime('now');

        return $this;
    }

    public function isNewsletterSubscribe(): ?bool
    {
        return $this->newsletterSubscribe;
    }

    public function setNewsletterSubscribe(bool $newsletterSubscribe): self
    {
        $this->newsletterSubscribe = $newsletterSubscribe;

        return $this;
    }
}
