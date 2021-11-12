<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\EquipeMatchsRepository;
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
 * @ORM\Entity(repositoryClass=EquipeMatchsRepository::class)
 */
class EquipeMatchs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Matchs::class, inversedBy="equipeMatchs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $matchs;

    /**
     * @ORM\ManyToOne(targetEntity=Equipe::class, inversedBy="equipeMatchs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipe;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getEquipe(): ?Equipe
    {
        return $this->equipe;
    }

    public function setEquipe(?Equipe $equipe): self
    {
        $this->equipe = $equipe;

        return $this;
    }
}
