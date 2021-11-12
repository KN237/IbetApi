<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\EquipeRepository;
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
 * @ORM\Entity(repositoryClass=EquipeRepository::class)
 */
class Equipe
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
    private $logo;

    /**
     * @ORM\OneToMany(targetEntity=EquipeMatchs::class, mappedBy="equipe")
     */
    private $equipeMatchs;

    public function __construct()
    {
        $this->equipeMatchs = new ArrayCollection();
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

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

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
            $equipeMatch->setEquipe($this);
        }

        return $this;
    }

    public function removeEquipeMatch(EquipeMatchs $equipeMatch): self
    {
        if ($this->equipeMatchs->removeElement($equipeMatch)) {
            // set the owning side to null (unless already changed)
            if ($equipeMatch->getEquipe() === $this) {
                $equipeMatch->setEquipe(null);
            }
        }

        return $this;
    }


}
