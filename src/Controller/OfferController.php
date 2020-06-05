<?php

namespace App\Controller;

use App\Entity\Offer;
use App\Form\OffreType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/offer", name="offer_")
 */
class OfferController extends AbstractController
{
    /**
     * @Route("/offer", name="offer")
     */
    public function index()
    {
        return $this->render('offer/index.html.twig', [
            'controller_name' => 'OfferController',
        ]);
    }

    /**
     * @Route("/new", name="new")
     */
    public function new(Request $request, EntityManagerInterface $entityManager)
    {
        $offer = new Offer();
        $form = $this->createForm(OffreType::class, $offer);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($offer);
            $entityManager->flush();

            $this->redirectToRoute('offer_offer');
        }

        return $this->render('offer/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
