<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PointCleRepository;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource(
 * 
 *itemOperations={
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
 * @ORM\Entity(repositoryClass=PointCleRepository::class)
 */
class PointCle
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
    private $valeur;

    /**
     * @ORM\ManyToOne(targetEntity=Prono::class, inversedBy="pointCles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Prono;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getProno(): ?Prono
    {
        return $this->Prono;
    }

    public function setProno(?Prono $Prono): self
    {
        $this->Prono = $Prono;

        return $this;
    }
}
