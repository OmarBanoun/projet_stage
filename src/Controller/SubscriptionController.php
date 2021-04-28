<?php

namespace App\Controller;

use App\Entity\PsSubscription;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SubscriptionController extends AbstractController
{
    /**
     * @Route("/subscription", name="subscription")
     */
    public function index(): Response
    {
        $repository = $this->getDoctrine()->getRepository(PsSubscription::class);
        $premium = $repository->findOneBy(array("name" => "premium"));
        $decouverte = $repository->findOneBy(array("name" => "découverte"));
        return $this->render('subscription/index.html.twig', [
            'premium' => $premium,
            'decouverte' => $decouverte,
        ]);
    }
}
