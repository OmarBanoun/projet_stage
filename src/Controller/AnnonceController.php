<?php

namespace App\Controller;

use App\Entity\PsUser;
use App\Entity\Annonce;
use App\Form\AnnonceType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class AnnonceController extends AbstractController
{
    /**
     * @Route("/annonce", name="annonce")
     */
    public function index(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Annonce::class);
        $annonces = $repository->findAll();
        return $this->render('annonce/index.html.twig', [
            'annonces' => $annonces,
        ]);
    }
    /**
     * @Route("/annonce/coiffure", name="annonce_coiffure")
     */
    public function coiffure(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Annonce::class);
        $annonces = $repository->findBy(array("category" => 1));
        return $this->render('annonce/index.html.twig', [
            'annonces' => $annonces,
        ]);
    }
    /**
     * @Route("/annonce/traiteur", name="annonce_traiteur")
     */
    public function traiteur(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Annonce::class);
        $annonces = $repository->findBy(array("category" => 2));
        return $this->render('annonce/index.html.twig', [
            'annonces' => $annonces,
        ]);
    }
    /**
     * @Route("/annonce/salle", name="annonce_salle")
     */
    public function salle(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Annonce::class);
        $annonces = $repository->findBy(array("category" => 3));
        return $this->render('annonce/index.html.twig', [
            'annonces' => $annonces,
        ]);
    }

    /**
     * Requête à la base de données pour obtenir le détail d'une annonce
     * @Route("/annonce/{slug}", name="annonce-detail")
     * @return Response
     */
    public function annonceDetail($slug): Response
    {
        $repository = $this->getDoctrine()->getRepository(Annonce::class);
        $annonce = $repository->find($slug);

        return $this->render('annonce/annonce_detail.html.twig', ["annonce" => $annonce]);
    }

    /**
     * @Route("/modifier-annonce/{id}", name="annonce-update")
     */
    public function editAnnonce(Annonce $annonce, Request $request): Response
    {
        // Mise en place du formulaire
        $form = $this->createForm(AnnonceType::class, $annonce);

        // On vérifie si on a des données postées dans la requête, ce qui signifierait que l'on est en mode vérification de formulaire et pas affichage simple
        $form->handleRequest($request);
        dump($request->query->get('parameters'));
        $test = $request->get('parameters');

        dump($test);

        if ($form->isSubmitted() && $form->isValid()) {
            $annonce = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($annonce);
            $entityManager->flush();
            // On met en place un flashMessage de Symfony 
            $this->addFlash('success', 'Vos modifications ont bien été enregistrées.');
            return $this->redirectToRoute('profil', [
                'id' => $annonce->getId(),
            ]);
        }
        return $this->render('profil/update_annonce.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    // remove an article
    /**
     * @Route("annonce/supprimer/{id}", name="annonce-delete")
     * @param int $id
     */
    public function deleteAnnonce(int $id): Response
    {
        $annonce = $this->getDoctrine()->getRepository(Annonce::class)->find($id);

        $manager = $this->getDoctrine()->getManager();

        $manager->remove($annonce);
        $manager->flush();
        $this->addFlash('success', 'L\'article a bien été supprimé');

        return $this->redirectToRoute('profil');
    }
}
