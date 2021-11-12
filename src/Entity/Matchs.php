<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\MatchsRepository;
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
 * @ORM\Entity(repositoryClass=MatchsRepository::class)
 */
class Matchs
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
    private $date;

    /**
     * @ORM\OneToMany(targetEntity=Prono::class, mappedBy="matchs")
     */
    private $pronos;

    /**
     * @ORM\ManyToOne(targetEntity=Championnat::class, inversedBy="matchs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $championnat;

    /**
     * @ORM\OneToMany(targetEntity=EquipeMatchs::class, mappedBy="matchs", orphanRemoval=true)
     */
    private $equipeMatchs;

    public function __construct()
    {
        $this->pronos = new ArrayCollection();
        $this->equipeMatchs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|Prono[]
     */
    public function getPronos(): Collection
    {
        return $this->pronos;
    }

    public function addProno(Prono $prono): self
    {
        if (!$this->pronos->contains($prono)) {
            $this->pronos[] = $prono;
            $prono->setMatchs($this);
        }

        return $this;
    }

    public function removeProno(Prono $prono): self
    {
        if ($this->pronos->removeElement($prono)) {
            // set the owning side to null (unless already changed)
            if ($prono->getMatchs() === $this) {
                $prono->setMatchs(null);
            }
        }

        return $this;
    }

    public function getChampionnat(): ?Championnat
    {
        return $this->championnat;
    }

    public function setChampionnat(?Championnat $championnat): self
    {
        $this->championnat = $championnat;

        return $this;
    }

    /**
     * @return Collection|EquipeMatchs[]
     */
    public function getEquipeMatchs(): Collection
    {
        return $this->equipeMatchs;
    }

    public function addEquipeMatch(EquipeMatchs $equipeMatch): self
    {
        if (!$this->equipeMatchs->contains($equipeMatch)) {
            $this->equipeMatchs[] = $equipeMatch;
            $equipeMatch->setMatchs($this);
        }

        return $this;
    }

    public function removeEquipeMatch(EquipeMatchs $equipeMatch): self
    {
        if ($this->equipeMatchs->removeElement($equipeMatch)) {
            // set the owning side to null (unless already changed)
            if ($equipeMatch->getMatchs() === $this) {
                $equipeMatch->setMatchs(null);
            }
        }

        return $this;
    }


}
