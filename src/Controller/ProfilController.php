<?php

namespace App\Controller;

use App\Entity\PsUser;
use App\Form\UserType;
use App\Entity\Annonce;
use App\Form\ProfilType;
use App\Form\AnnonceType;
use App\Entity\PsSubscription;
use App\Entity\PsSubscriptionDetail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Controller\UserValueResolver;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ProfilController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscription(Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        // Mise en place des éléments pour renvoyer un formulaire à la vue
        $user = new PsUser();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // On ajoute le rôle user à l'utilisateur
            $user->setRoles(["ROLE_USER"]);
            // On prend en charge l'encodage du password
            // $passwordOrigine = $user->getPassword();
            // $passwordEncode = $encoder->encodePassword($user, $passwordOrigine);
            $user->setPassword('password');
            // On récupère ensuite le manager d'entity qui permet les transactions avec la BDD
            $entityManager = $this->getDoctrine()->getManager();
            // On mémorise le contact pour une mise en base de données future
            $entityManager->persist($user);
            // On envoie en bdd
            $entityManager->flush();
            // return new Response("Utilisateur correctement ajouté");
            return $this->redirectToRoute('home');
        }
        // X. On retourne le rendu de la vue en lui passant en paramètre la création de la vue html correspondant au modèle du formulaire($form)
        return $this->render('profil/inscription.html.twig', [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/profil", name="profil")
     */
    public function profil(Security $security, Request $request, UserPasswordEncoderInterface $encoder, ValidatorInterface $validator, UserInterface $user): Response
    {
    // Avec le service Security, on récupère le user connecté pour obtenir ses infos à modifier
    $id = $security->getUser()->getId();
    // On récupère la repository des User et on va chercher l'utilisateur par son id
    $repository = $this->getDoctrine()->getRepository(PsUser::class);
    $user = $repository->find($id);
    // Mise en place du formulaire
    $form = $this->createForm(ProfilType::class, $user);
    // On vérifie si on a des données postées dans la requête, ce qui signifierait que l'on est en mode vérification de formulaire et pas affichage simple
    $form->handleRequest($request);
    
    if ($form->isSubmitted() && $form->isValid()) {
        // dd($user);
        // On récupère ensuite le manager d'entity qui permet les transactions avec la BDD
        $entityManager = $this->getDoctrine()->getManager();
        // Prise en charge d'un changement potentiel de password
        $newPassword = $request->request->get('newPassword');
        // On vérifie si la donnée n'est pas vide
        if(!empty($newPassword)){
            // On encode le nouveau password
            $password = $encoder->encodePassword($user, $newPassword);
            // On met à jour la propriété du user
            $user->setPassword($password);
        }
        // On mémorise le contact pour une mise en base de données future
        $entityManager->persist($user);
        // On envoie en bdd
        $entityManager->flush();
        // On met en place un flashMessage de Symfony 
        $this->addFlash('success', 'Vos modifications ont bien été enregistrées.');
        return $this->redirectToRoute('profil');
    }
    $repository = $this->getDoctrine()->getRepository(Annonce::class);
    $annonces = $repository->findBy(array('user'=>$user));
    $abonnement = $user->getSubscription();
    
    // dump($userAbo);
    // dump('toto');
    // Rendu
    return $this->render('profil/profil.html.twig', [
        'form' => $form->createView(),
        'annonces' => $annonces,
        'abonnement' => $abonnement,
    ]);
    }
    /**
     * @Route("/profil/new_annonce", name="new_annonce")
     */
    public function addAnnonce(Security $security, Request $request): Response
    {
        $user = $security->getUser();
        $addAnnonce = new Annonce();
        // 2. On instancie un formulaire de contact
        $form = $this->createForm(AnnonceType::class, $addAnnonce);
        // 3. On hydrate le formulaire avec les potentielles données se trouvant dans la requête
        $form->handleRequest($request);
        // 4. On vérifie s'il y a des données conformes dans le formulaire
        if ($form->isSubmitted() && $form->isValid()) {
            // Mise en base de données
            $addAnnonce->setUser($user);
            // On demande au contrôleur ($this) de récupérer l'instance de Doctrine à l'aide de la méthode getDoctrine() héritée de AbstractController(le contrôleur étant
            // AbstractController)
            // On récupère ensuite le manager d'entity qui permet les transactions avec la BDD
            $entityManager = $this->getDoctrine()->getManager();
            // On mémorise le contact pour une mise en base de données future
            $entityManager->persist($addAnnonce);
            // On envoie en bdd
            $entityManager->flush();
            // On redirige vers la page de confirmation
            return $this->redirectToRoute('profil');
        }
        if (!is_null($security->getUser())) {
            // Avec le service Security, on récupère le user connecté pour obtenir ses infos à modifier
            $id = $security->getUser()->getId();
            // On récupère la repository des User et on va chercher l'utilisateur par son id
            $repository = $this->getDoctrine()->getRepository(PsUser::class);
            $user = $repository->find($id);
            return $this->render('profil/new_annonce.html.twig', [
                'form' => $form->createView(),
            ]);
        }
    }
}
