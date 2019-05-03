<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\UserType;
use App\Security\StubAuthenticator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Component\HttpFoundation\Response;


class ConnectionController extends AbstractController
{
    /**
     * @Route("/home/connexion", name="connexion")
     */
    public function index()
    {
        return $this->render('connection/index.html.twig', [
            'controller_name' => 'ConnectionController',
        ]);
    }
    /**
     * @Route("/home/inscription", name="inscription")
     */
    public function Ajouter(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
      $users = new User();
        $form = $this->createForm(UserType::class, $users);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          $password = $passwordEncoder->encodePassword($users, $users->getPlainPassword());
          $users->setPassword($password);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($users);
            $entityManager->flush();

            return $this->redirectToRoute('home');
      }

      return $this->render("connection/inscription.html.twig",[
          "inscription" => $form->createView(),
      ]);
    }
}
