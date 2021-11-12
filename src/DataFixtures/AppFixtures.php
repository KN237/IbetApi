<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Equipe;
use App\Entity\Validite;
use App\Entity\Abonnement;
use App\Entity\Championnat;
use App\Entity\Utilisateur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{   
    protected $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder=$encoder;
        
    }
    public function load(ObjectManager $manager): void
    {  
       $faker = \Faker\Factory::create("fr_FR"); 

        $abonnement= new Abonnement();
        $abonnement->setLibelle("Basic");
        $abonnement->setMontant(2000);
        $abonnement->setDuree(30);
        $manager->persist($abonnement);
       
        for($i=0;$i<10;$i++){
          $utilisateur = new Utilisateur();
          $utilisateur->setNom($faker->firstname);
          $utilisateur->setPrenom($faker->lastname);
          $utilisateur->setEmail($faker->email);
          $utilisateur->setPassword('password');
          $hash=$this->encoder->encodePassword($utilisateur,$utilisateur->getPassword());
          $utilisateur->setPassword($hash);
          $manager->persist($utilisateur);

          $validite = new Validite();
          $validite->setDateDebut( new \DateTime());
          $validite->setUtilisateur($utilisateur);
          $validite->setAbonnement($abonnement);
          $manager->persist($validite);

        }

        for($i=0;$i<5;$i++){

            $Championnat = new Championnat();
            $Championnat->setNom($faker->name);
            $Championnat->setPays($faker->country);
            $manager->persist($Championnat);
  
          }

          for($i=0;$i<5;$i++){

            $equipe = new Equipe();
            $equipe->setNom($faker->lastname);
            $equipe->setLogo($faker->imageUrl());
            $manager->persist($equipe);
  
          }  
          
        // $manager->persist($product);

        $manager->flush();
    }
}
