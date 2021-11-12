<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ValiditeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 * 
 * itemOperations={
 * "get","patch","put"
 * },
 * 

 * 
 * )
 * @ORM\Entity(repositoryClass=ValiditeRepository::class)
 */
class Validite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDebut;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="validites")
     */
    private $utilisateur;

    /**
     * @ORM\ManyToOne(targetEntity=Abonnement::class, inversedBy="validites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $abonnement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getAbonnement(): ?Abonnement
    {
        return $this->abonnement;
    }

    public function setAbonnement(?Abonnement $abonnement): self
    {
        $this->abonnement = $abonnement;

        return $this;
    }
}
