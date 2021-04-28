<?php

namespace App\Controller;

use App\Entity\PsAbout;
use App\Entity\PsHome;
use App\Entity\PsMain;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Security;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     * @Route("/", name="index")
     */
    public function index(Security $security ): Response
    {
        $repository = $this->getDoctrine()->getRepository(PsHome::class);
        $homeA = $repository->findOneBy(array("active"=>1, "localisation" => "A"));
        $homeB = $repository->findOneBy(array("active"=>1, "localisation" => "B" ));
        $homeC = $repository->findOneBy(array("active"=>1, "localisation" => "C" ));
        $repository = $this->getDoctrine()->getRepository(PsMain::class);
        $mainImage = $repository->findOneBy(array("active"=>1));
        $repository = $this->getDoctrine()->getRepository(PsAbout::class);
        $abouts = $repository->findAll();
        return $this->render('home/index.html.twig', [
            'homeA' => $homeA,
            'homeB' => $homeB,
            'homeC' => $homeC,
            'mainImage' => $mainImage,
            'abouts' => $abouts
        ]);
    }
}
