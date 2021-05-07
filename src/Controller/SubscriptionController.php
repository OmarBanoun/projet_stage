<?php

namespace App\Controller;

use App\Entity\PsSubscription;
use App\Form\SubscriptionType;
use App\Entity\PsSubscriptionDetail;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

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
    /**
     * @Route("/subscription/form", name="subscription_form")
     */
    public function sub(Request $request): Response
    {
        $repository = $this->getDoctrine()->getRepository(PsSubscription::class);
        $premium = $repository->findOneBy(array("name" => "premium"));

        $subscription = new PsSubscriptionDetail();
        $startDate = new \DateTime('now');
        $endDate = clone $startDate;
        $endDate->add($premium->getDuration());
        $now = new \DateTime('now');
        $expire = $now > $endDate;
        if ($expire){
            $subscription->setIsExpired(true);
        }else{
            $subscription->setIsExpired(false);
        }
        dump($expire);
        $form = $this->createForm(SubscriptionType::class, $subscription);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $subscription->setStartDate($startDate);
            $subscription->setEndDate($endDate);
            // $subscription->setIsExpired($isExpired);
            $em = $this->getDoctrine()->getManager();
            $em->persist($subscription);
            $em->flush();
            // $this->addFlash('success', 'Vos modifications ont bien été enregistrées.');
            return $this->redirectToRoute('home');
        }
        return $this->render('subscription/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
