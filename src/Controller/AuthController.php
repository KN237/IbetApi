<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AuthController extends AbstractController
{
    /**
     * @Route("/login", name="api_login",methods={"POST"})
     */
    public function login()
    {
        $user=$this->getUser();
        return $this->json([
            'nom'=>$user->getNom(),
            'prenom'=>$user->getPrenom(),
            'email'=>$user->getEmail(),
            'roles'=>$user->getRoles(),
        ]);
    }


    /**
     * @Route("/logout", name="api_logout")
     */
    public function logout()
    {
       
    }


    /**
     * @Route("/api/test", name="test")
     * @IsGranted("ROLE_USER")
     */
    public function test()
    {
        if($user=$this->getUser()){
        $user=$this->getUser();
        return $this->json([
            'nom'=>$user->getNom(),
            'prenom'=>$user->getPrenom(),
            'email'=>$user->getEmail(),
            'roles'=>$user->getRoles(),
        ]);

    }

    return $this->json([
        'response'=>'null',
    ]);
}

}