<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PronoRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ApiResource(
 *  itemOperations={
 * "get"
 * },
 * 
 * collectionOperations={
 * 
 * 
 * "get"
 * 
 * })
 * @ORM\Entity(repositoryClass=PronoRepository::class)
 * 
 */
class Prono
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
     * @ORM\Column(type="string", length=255)
     */
    private $valeur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $commentaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $point;

    /**
     * @ORM\Column(type="boolean")
     */
    private $supprime;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDeCreation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateDeModification;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="pronos")
     */
    private $utilisateur;

    /**
     * @ORM\OneToMany(targetEntity=PointCle::class, mappedBy="Prono", orphanRemoval=true)
     */
    private $pointCles;

    /**
     * @ORM\ManyToOne(targetEntity=Matchs::class, inversedBy="pronos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $matchs;


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

    public function getValeur(): ?string
    {
        return $this->valeur;
    }

    public function setValeur(string $valeur): self
    {
        $this->valeur = $valeur;

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

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getPoint(): ?string
    {
        return $this->point;
    }

    public function setPoint(string $point): self
    {
        $this->point = $point;

        return $this;
    }

    public function getSupprime(): ?bool
    {
        return $this->supprime;
    }

    public function setSupprime(bool $supprime): self
    {
        $this->supprime = $supprime;

        return $this;
    }

    public function getDateDeCreation(): ?\DateTimeInterface
    {
        return $this->dateDeCreation;
    }

    public function setDateDeCreation(\DateTimeInterface $dateDeCreation): self
    {
        $this->dateDeCreation = $dateDeCreation;

        return $this;
    }

    public function getDateDeModification(): ?\DateTimeInterface
    {
        return $this->dateDeModification;
    }

    public function setDateDeModification(?\DateTimeInterface $dateDeModification): self
    {
        $this->dateDeModification = $dateDeModification;

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

   

    public function getMatchs(): ?Matchs
    {
        return $this->matchs;
    }

    public function setMatchs(?Matchs $matchs): self
    {
        $this->matchs = $matchs;

        return $this;
    }
}
