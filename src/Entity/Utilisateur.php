<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ApiResource(
 * 
 * itemOperations={
 * "get"={
 *    
 *   "output"=false,
 *    "read"=false
 * },
 * "patch","put"
 * 
 * },
 * 
 * collectionOperations={
 * 
 * "test"={
 *  
 * "paginationEnabled"=false,
 * "path"="/api/test",
 * "method"="GET",
 * "controller"=AuthController::class,
 * "read"=false },
 * "post"
 * 
 * }
 * 
 * )
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 */

class Utilisateur implements UserInterface
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
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255,unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

     /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\OneToMany(targetEntity=Validite::class, mappedBy="utilisateur")
     */
    private $validites;

    /**
     * @ORM\OneToMany(targetEntity=Like::class, mappedBy="utilisateur", orphanRemoval=true)
     */
    private $likes;

    /**
     * @ORM\OneToMany(targetEntity=PronoLive::class, mappedBy="utilisateur")
     */
    private $pronoLives;

    /**
     * @ORM\OneToMany(targetEntity=Prono::class, mappedBy="utilisateur")
     */
    private $pronos;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $point;

 
    public function __construct()
    {
        $this->validites = new ArrayCollection();
        $this->likes = new ArrayCollection();
        $this->pronoLives = new ArrayCollection();
        $this->pronos = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

       /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

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
            $validite->setUtilisateur($this);
        }

        return $this;
    }

    public function removeValidite(Validite $validite): self
    {
        if ($this->validites->removeElement($validite)) {
            // set the owning side to null (unless already changed)
            if ($validite->getUtilisateur() === $this) {
                $validite->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Like[]
     */
    public function getLikes(): Collection
    {
        return $this->likes;
    }

    public function addLike(Like $like): self
    {
        if (!$this->likes->contains($like)) {
            $this->likes[] = $like;
            $like->setUtilisateur($this);
        }

        return $this;
    }

    public function removeLike(Like $like): self
    {
        if ($this->likes->removeElement($like)) {
            // set the owning side to null (unless already changed)
            if ($like->getUtilisateur() === $this) {
                $like->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PronoLive[]
     */
    public function getPronoLives(): Collection
    {
        return $this->pronoLives;
    }

    public function addPronoLife(PronoLive $pronoLife): self
    {
        if (!$this->pronoLives->contains($pronoLife)) {
            $this->pronoLives[] = $pronoLife;
            $pronoLife->setUtilisateur($this);
        }

        return $this;
    }

    public function removePronoLife(PronoLive $pronoLife): self
    {
        if ($this->pronoLives->removeElement($pronoLife)) {
            // set the owning side to null (unless already changed)
            if ($pronoLife->getUtilisateur() === $this) {
                $pronoLife->setUtilisateur(null);
            }
        }

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
            $prono->setUtilisateur($this);
        }

        return $this;
    }

    public function removeProno(Prono $prono): self
    {
        if ($this->pronos->removeElement($prono)) {
            // set the owning side to null (unless already changed)
            if ($prono->getUtilisateur() === $this) {
                $prono->setUtilisateur(null);
            }
        }

        return $this;
    }


    public function eraseCredentials()
    {
        
    }

    public function getSalt()
    {
        
    }

    public function getUsername()
    {
        return $this->email;
    }

    public function getPoint(): ?int
    {
        return $this->point;
    }

    public function setPoint(?int $point): self
    {
        $this->point = $point;

        return $this;
    }


}
