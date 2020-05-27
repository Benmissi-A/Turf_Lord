<?php


namespace App\Controller;


use App\Entity\Horse;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HorseController extends AbstractController
{
    /**
     * @Route("/horse", name="horse")
     */
    public function index(EntityManagerInterface $em)
    {
        $horsesList = $em->getRepository(Horse::class)->findAll();
        //dd($horsesList);

        return $this->render('horse/index.html.twig', [
            'controller_name' => 'HorseController', 'horsesList' => $horsesList
        ]);
    }
}