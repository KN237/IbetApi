<?php

namespace App\DataPersisters;

use App\Entity\Utilisateur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ManagerRegistry;
use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UtilisateurPersisters implements DataPersisterInterface{

    protected $manager;

    protected $encoder;

    public function __construct(ManagerRegistry $manager,UserPasswordEncoderInterface $encoder)
    {
        $this->manager=$manager;

        $this->encoder=$encoder;
    }

    public function supports($data): bool
    {
        return $data instanceof Utilisateur;
    }

    public function persist($data)
    {   
        $hash=$this->encoder->encodePassword($data,$data->getPassword());
        $data->setPassword($hash);
        $this->manager->getManager()->persist($data);
        $this->manager->getManager()->flush();
    }

    public function remove($data)
    {
        $this->manager->getManager()->remove($data);
        $this->manager->getManager()->flush();
    }
}