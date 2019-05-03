<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeUsersController extends AbstractController
{
    /**
     * @Route("/home/users", name="home_users")
     */
    public function index()
    {
        return $this->render('home_users/index.html.twig', [
            'controller_name' => 'HomeUsersController',
        ]);
    }
}
