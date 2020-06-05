<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Entity\Offer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/candidat", name="candidat_")
 */
class CandidatController extends AbstractController
{
    /**
     * @Route("/all/offer/{offer}", name="all")
     */
    public function index(EntityManagerInterface $entityManager, Offer $offer)
    {
        $marien = new Candidat();
        $marien->setName('Marien');
        $marien->addOffer($offer);
        $entityManager->persist($marien);
        $entityManager->flush();



        return $this->render('candidat/index.html.twig', [
            'controller_name' => 'CandidatController',
        ]);
    }
}
