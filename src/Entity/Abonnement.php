<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AbonnementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

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
 * })
 * @ORM\Entity(repositoryClass=AbonnementRepository::class)
 */
class Abonnement
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
    private $libelle;

    /**
     * @ORM\Column(type="integer")
     */
    private $duree;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant;

    /**
     * @ORM\OneToMany(targetEntity=Validite::class, mappedBy="abonnement", orphanRemoval=true)
     */
    private $validites;

    public function __construct()
    {
        $this->validites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * @return Collection|Validite[]
     */
    public function getValidites(): Collection
    {
        return $this->validites;
    }

    public function addValidite(Validite $validite): self
    {
        if (!$this->validites->contains($validite)) {
            $this->validites[] = $validite;
            $validite->setAbonnement($this);
        }

        return $this;
    }

    public function removeValidite(Validite $validite): self
    {
        if ($this->validites->removeElement($validite)) {
            // set the owning side to null (unless already changed)
            if ($validite->getAbonnement() === $this) {
                $validite->setAbonnement(null);
            }
        }

        return $this;
    }
}
