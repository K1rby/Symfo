<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;
use App\Entity\Aeroport;
use App\Entity\Vol;
use App\Entity\Billet;
use App\Entity\HistoriqueBillet;
use App\Entity\Prix;
use App\Entity\Classe;
use App\Entity\Tarif;
use App\Entity\Voyage;
use App\Entity\Trajet;
use App\Form\UserType;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    /**
    * @Route("/home/search_vol", name="search_vol")
    */
    public function search(Request $request): Response
    {
      if(empty($_POST))
      {
        return $this->render('home/error.html.twig');
      }

      $depart = $_POST['aeroport_depart'];
      $arriver = $_POST['aeroport_arriver'];
      $date_depart = $_POST['date_depart'];
      $classe = $_POST['classe'];
      $tarif = $_POST['tarif'];

      $entityManager = $this->getDoctrine()->getManager(); //on appelle Doctrine
      $recup_depart = $entityManager->getRepository(Aeroport::class)->findBy(array("ville" => $depart));
      $recup_arriver = $entityManager->getRepository(Aeroport::class)->findBy(array("ville" => $arriver));
      $getTrajet = $entityManager->getRepository(Trajet::class)->findBy(array("aeroporta" => $recup_arriver, "aeroportd" => $recup_depart));
    //  $getVol = $entityManager->getRepository(Vol::class)->findOneBy(array('idTrajet' => $getTrajet));
      $getPrix = $entityManager->getRepository(Prix::class)->findBy(array('idClasse' => $classe, 'idTarif' => $tarif));
    //  $query = $entityManager->createQuery( //creation de la requête
      //  select * from vol where DATE_FORMAT(dateD, '%d/%m/%Y') = $date and id_trajet = $getTrajet);
       $queryBuilder = $entityManager->getRepository(Vol::class)->createQueryBuilder('u');
       $queryBuilder->andWhere("DATE_FORMAT(u.dated, '%Y-%m-%d') = :date and u.idTrajet = :idTrajet");
       $queryBuilder->setParameter('date', $date_depart);
       $queryBuilder->setParameter('idTrajet', $getTrajet);
       $getVol = $queryBuilder->getQuery()->getResult();
      if ($getVol == NULL)
      {
        return $this->render('home/error.html.twig');
      }
    // $id = $getVol->getIdVol();
    //$getVoyage = $getVol->getIdVoyage();

      return $this->render('home/searchVol.html.twig', [
          'controller_name' => 'HomeController',
          'vol' => $getVol,
          //'id_vol' => $id,
          //'id_voyage' => $getVoyage,
          'prix' => $getPrix,
      ]);
    }
    /**
    * @Route("/home/reserver{idVol}/{idPrix}", name="reserver")
    */
    public function reserve($idVol, $idPrix)
    {
      $entityManager = $this->getDoctrine()->getManager(); //on appelle Doctrine
      $repository=$entityManager->getRepository(Vol::class);
      $id=$repository->find($idVol);
      $repository_prix=$entityManager->getRepository(Prix::class);
      $id_prix=$repository_prix->find($idPrix);
      $getVol = $entityManager->getRepository(Vol::class)->findBy(array('idVol' => $id));
      $get_trajet = $entityManager->getRepository(Vol::class)->findBy(array('idTrajet' => $id));
      $getPrix = $entityManager->getRepository(Prix::class)->findBy(array('idPrix' => $id_prix));
      return $this->render('home/reserve.html.twig', [
          'controller_name' => 'HomeController',
          'vol' => $getVol,
          'prix' => $getPrix,
      ]);
    }

    /**
    * @Route("/home/reserver/ajouter{idVole}/{idPrix}", name="ajouter")
    */
    public function ajouter($idVole, $idPrix)
    {
      $entityManager = $this->getDoctrine()->getManager(); //on appelle Doctrine
      $repository=$entityManager->getRepository(Vol::class);
      $id=$repository->find($idVole);
      $repository_prix=$entityManager->getRepository(Prix::class);
      $id_prix=$repository_prix->find($idPrix);
      $getVol = $entityManager->getRepository(Vol::class)->findOneBy(array('idVol' => $id));
      $get_trajet = $entityManager->getRepository(Vol::class)->findOneBy(array('idTrajet' => $id));

      $user = $this->getUser();
      if ($user == NULL)
      {
        $this->addFlash('error', 'Vous devez être connecter pour réserver un vol');
        return $this->redirectToRoute("app_login");
      }
      $classe = $id_prix->getIdClasse();
      $tarif = $id_prix->getIdTarif();
      $voyage = $id_prix->getIdVoyage();

      $billet = new Billet();
      $entityManager = $this->getDoctrine()->getManager();
      $billet->setIdPassager($user);
      $billet->setIdClasse($classe);
      $billet->setIdTarif($tarif);
      $billet->setIdVoyage($voyage);
      $billet->setIdPrix($id_prix);
      $entityManager->persist($billet);
      $entityManager->flush();

      $historique_billet = new HistoriqueBillet();
      $entityManager = $this->getDoctrine()->getManager();
      $historique_billet->setIdPassager($user);
      $historique_billet->setIdPrix($id_prix);
      $historique_billet->setDateAchat(new \DateTime('now'));
      $entityManager->persist($historique_billet);
      $entityManager->flush();

      return $this->redirectToRoute("home"); //Le home
  }
}
