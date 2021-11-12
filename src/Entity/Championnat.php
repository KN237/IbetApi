<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ChampionnatRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

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
 * @ORM\Entity(repositoryClass=ChampionnatRepository::class)
 */
class Championnat
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pays;

    /**
     * @ORM\OneToMany(targetEntity=Matchs::class, mappedBy="championnat", orphanRemoval=true)
     */
    private $matchs;

    public function __construct()
    {
        $this->matchs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * @return Collection|Matchs[]
     */
    public function getMatchs(): Collection
    {
        return $this->matchs;
    }

    public function addMatch(Matchs $match): self
    {
        if (!$this->matchs->contains($match)) {
            $this->matchs[] = $match;
            $match->setChampionnat($this);
        }

        return $this;
    }

    public function removeMatch(Matchs $match): self
    {
        if ($this->matchs->removeElement($match)) {
            // set the owning side to null (unless already changed)
            if ($match->getChampionnat() === $this) {
                $match->setChampionnat(null);
            }
        }

        return $this;
    }
}
