<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\HistoriqueBillet;

class MemberController extends AbstractController
{
    /**
     * @Route("/member", name="member")
     */
    public function index()
    {
      $user = $this->getUser();
      $entityManager = $this->getDoctrine()->getManager();
      $getBillet = $entityManager->getRepository(HistoriqueBillet::class)->findBy(array('idPassager' => $user));
        return $this->render('member/index.html.twig', [
            'controller_name' => 'MemberController',
            'billet' => $getBillet,
        ]);
    }
}
