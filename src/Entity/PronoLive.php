<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PronoLiveRepository;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource(
 * 
 * itemOperations={
 * "get"
 * },
 * 
 * collectionOperations={
 * 
 * 
 * "get"
 * 
 * }
 * 
 * )
 * @ORM\Entity(repositoryClass=PronoLiveRepository::class)
 */
class PronoLive
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codeCoupon;

    /**
     * @ORM\Column(type="text")
     */
    private $commentaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="pronoLives")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeCoupon(): ?string
    {
        return $this->codeCoupon;
    }

    public function setCodeCoupon(string $codeCoupon): self
    {
        $this->codeCoupon = $codeCoupon;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

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
}
